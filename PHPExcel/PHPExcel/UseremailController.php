<?php

namespace app\controllers;

use app\models\CustomerInfo;
use app\models\EmailLog;
use app\models\EmailSearch;
use app\models\Template;
use Exception;
use PHPExcel_Cell;
use PHPExcel_IOFactory;
use stdClass;
use Yii;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\swiftmailer\Mailer;
use yii\web\Controller;
use yii\web\Response;

class UseremailController extends Controller {

    public $enableCsrfValidation = false;
    public $staticClient;

    private function call($url, $params) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.xone.vn/' . $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result);

        return $result;
    }

    public function getCall() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://chat.zamba.vn/api.php?mod=chat&cmd=shopConversation&project=mrvccn1&token=c3284d0f94606de1fd2af172aba15bf3&sproject=all');
//        curl_setopt($ch, CURLOPT_URL, 'http://chat.zamba.vn/api.php?mod=chat&cmd=shopConversation&project=mrvccn1&token=c3284d0f94606de1fd2af172aba15bf3&datefrom=2015-09-30');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result);
        return $result;
    }

    /**
     * Gửi từng email trước
     */
    public function actionChatmail() {
        $data = $this->getCall();
        if ($data->status) {
            if ($data->numberTotal > 0) {
                $ChatData = $this->resovelChat($data->data);
                if (!empty($ChatData['zing'])) {
                    $email = $this->setUpZing($ChatData['zing']);
                    $result = $this->sendChat($email, $ChatData['zing']);
                    if ($result) {
                        if (!empty($ChatData['zang'])) {
                            $email_zang = $this->setUpZang($email, $ChatData['zang']);
                            $result = $this->sendChat($email_zang, $ChatData['zang']);
                        }
                    }
                }
            }
        }
    }

    /**
     * Gửi từng email trước
     */
    private function setUpZang($email, $listData) {
        $tokenKey = unserialize($email->token);
        $openKey = unserialize($email->token_open);
        $feedbackKey = unserialize($email->feedback_token);

        $arrayData = [];
        $i = 0;
        foreach ($listData as $val) {
            if ($val[0]->InfoTo != null) {
                $arrayData['kemail-' . $i] = $val[0]->InfoTo->email;
                $i++;
            }
        }

        $feedback = array_merge($feedbackKey, unserialize($this->bornToken($arrayData, 'feedback')));
        $open = array_merge($openKey, unserialize($this->bornToken($arrayData, 'open')));
        $unscrub = array_merge(unserialize($this->bornToken($arrayData, 'unscriable')), $tokenKey);
        $email->body = serialize($arrayData);
        $email->updateTime = time();
        $email->from = 'support@muare.vn';
        $email->feedback_token = serialize($feedback);
        $email->token_open = serialize($open);
        $email->token = serialize($unscrub);
        $email->total_email += count($arrayData);
        $email->save(false);
        return $email;
    }

    /**
     * Khởi tạo dữ liệu với Zing
     */
    private function setUpZing($arrayData) {
        $i = 0;
        $emailList = [];
        $arrayList = [];
        $email = new EmailLog();
        $email->createTime = time();

        foreach ($arrayData as $val) {
            if (is_object($val->InfoTo)) {
                $regex = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/';
                if (preg_match($regex, $val->InfoTo->email) && preg_match($regex, $val->InfoFrom->email)) {
                    $emailList['email-' . $i] = $val->InfoTo->email;
                    $arrayList[] = $val->InfoTo->email;
                    $i++;
                }
            }
        }

        $feedback = $this->bornToken($arrayList, 'feedback');
        $open = $this->bornToken($arrayList, 'open');
        $unscrub = $this->bornToken($arrayList, 'unscriable');

        $email->list_email = serialize($emailList);
        $email->feedback_token = $feedback;
        $email->token_open = $open;
        $email->token = $unscrub;
        $email->total_email = count($arrayList);
        $email->updateTime = time();
        $email->roleMail = 'chat';
        $email->save(false);
        return $email;
    }

    /**
     * Xử lý dữ liệu bị loạn trong email
     * @param type $data
     */
    private function refreshChange($data) {
        if (!empty($data)) {
            if ($data->historyChat[0]->from != $data->from && $data->historyChat[0]->to != $data->to) {
                $middle = null;
                $middle = $data->InfoFrom;
                $data->InfoFrom = $data->InfoTo;
                $data->InfoTo = $middle;
            }
            return $data;
        }
    }

    /**
     * Xử lý dữ liệu lặp lại của chat
     * @param type $data
     */
    private function resovelChat($data) {
        $zing = [];
        $zang = [];
        $unset = [];

        foreach ($data as $val) {
            $val = $this->refreshChange($val);
            if (!empty($val->InfoTo)) {
                if (empty($zing) || !array_key_exists($val->InfoTo->username, $zing)) {
                    $zing[$val->InfoTo->username] = $val;
                } else if (!empty($zing) && array_key_exists($val->InfoTo->username, $zing)) {
                    $zang[$val->InfoTo->username][] = $val;
                    $unset[] = $val->InfoTo->username;
                }
            }
        }

        foreach (array_unique($unset) as $val) {
            unset($zing[$val]);
        }

        $arrList = [];
        foreach ($zang as $key => $value) {
            if (count($value) > 1) {
                foreach ($value as $key2 => $source) {
                    $dateVal = $source->InfoFrom->creationDate;
                    if (in_array($dateVal, $arrList)) {
                        unset($zang[$key][$key2]);
                    } else
                        $arrList[] = $dateVal;
                }
            } else {
                $zing[$value[0]->InfoTo->username] = $value[0];
                unset($zang[$key]);
            }
        }
        return ['zing' => $zing, 'zang' => $zang];
    }

//----------------------------------------------------- CHAT RESOLVE -----------------------------------------------------

    public function actionGrid() {
        $this->layout = false;
        $this->view->title = "Quản trị email";
        if (!Yii::$app->user->isGuest) {
            try {
                $user = Yii::$app->user->getIdentity();
                if (empty($user)) {
                    throw new Exception("Vui lòng đăng nhập trước khi thao tác");
                }

                $search = new EmailSearch();
                $search->user_id = $user->user_id;
                $search->setAttributes(\Yii::$app->request->get());

                $query = EmailLog::filter($search);
                $pages = new Pagination(['totalCount' => $query->count()]);
//                $pages->setPageSize(4);

                $data = $query->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();

                return $this->render('grid', [
                            'data' => $data,
                            'pages' => $pages
                ]);
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
        } else {
            return $this->redirect(['/site/loginadd?u_token=' . $_GET['u_token'] . '&url=' . Url::base('http') . '/useremail/grid']);
        }
    }

    public function actionDetail() {
        $this->layout = false;
        $this->view->title = "Xem chi tiết email";
        try {
            $user = Yii::$app->user->getIdentity();
            if (empty($user)) {
                throw new Exception("Vui lòng đăng nhập trước khi thao tác");
            }

            $id = Yii::$app->request->get('id');

            if (!empty($id)) {
                $email = EmailLog::findOne(['id' => $id, 'user_id' => $user->user_id]);
                if (!empty($email)) {
                    return $this->render('detail', [
                                'data' => $email,
                    ]);
                } else {
                    
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function actionCreate() {
        header('Access-Control-Allow-Origin: *');
        $this->layout = false;

        try {
            $user = Yii::$app->user->getIdentity();
            if (empty($user)) {
                throw new Exception("Vui lòng đăng nhập trước khi thao tác");
            }

            $user = CustomerInfo::findAll(['user_id' => $user->user_id]);
            if (\Yii::$app->request->get('id') != '') {
                $id = \Yii::$app->request->get('id');
                $email = EmailLog::getById($id);
                if (!empty($email)) {
                    $email->list_email = unserialize($email->list_email);
                    $email->handinput_list = unserialize($email->handinput_list);
                    $this->staticClient = 'var dataClient = ' . json_encode($email->list_email) . '; var inputClient = ' . json_encode($email->handinput_list) . '; email.init()';
                    return $this->render('create', [
                                'users' => $user,
                                'data' => $email
                    ]);
                }
            }

            return $this->render('create', [
                        'users' => $user,
            ]);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function actionSavetemplate() {
        header('Access-Control-Allow-Origin: *');

        try {
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                $id = $post['id'];
                $email = EmailLog::getById($id);
                if (!empty($email)) {
                    $email->body = $post['content'];
                    $email->updateTime = time();
                    $result = $email->save(false);
                    if ($result) {
                        return $this->parseJson(true, "Lưu dữ liệu thành công", $this->filterData($email));
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function actionTemplate() {
        $this->layout = false;
        try {
            $user = Yii::$app->user->getIdentity();
            if (empty($user)) {
                throw new Exception("Vui lòng đăng nhập trước khi thao tác");
            }
            $id = Yii::$app->request->get('id');
            if ($id != null) {
                $email = EmailLog::findOne(['id' => $id]);
            }

            $query = Template::find();
            $pages = new Pagination(['totalCount' => $query->count()]);
            $pages->pageSize = 6;
            $template = $query->all();

            return $this->render('template', [
                        'data' => $email,
                        'template' => $template
            ]);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function actionOption() {
        header('Access-Control-Allow-Origin: *');
        $this->layout = false;
        try {
            $id = \Yii::$app->request->get('id');
            if (!empty($id)) {
                $email = EmailLog::getById($id);
                if (empty($email->template_id)) {
                    return $this->redirect(Url::base('http') . '/useremail/template?id=' . $id);
                }
                return $this->render('option', [
                            'data' => $email
                ]);
            } else {
                return $this->redirect(Url::base('http') . '/useremail/create');
            }
        } catch (Exception $exc) {
            
        }
    }

    public function actionFinal() {
        $this->layout = false;
        try {
            $id = \Yii::$app->request->get('id');
            if (!empty($id)) {
                $email = EmailLog::getById($id);
                if ($email->step <= 2) {
                    return $this->redirect(Url::base('http') . '/useremail/template?id=' . $id);
                }
            } else {
                return $this->redirect(Url::base('http') . '/useremail/create');
            }
            return $this->render('final', []);
        } catch (Exception $exc) {
            
        }
    }

    /**
     * Đọc excel và trả lại client
     */
    public function actionReadxls() {
        header('Access-Control-Allow-Origin: *');
        \Yii::$app->response->format = Response::FORMAT_JSON;
        require_once '../PHPExcel/PHPExcel';
        $max_size = 5242880;

        if (is_array($_FILES)) {
            $fileName = $_FILES['import_excel']['name'];
            if ($fileName != '') {
                $tmp = explode('.', $fileName);
                $file_extension = end($tmp);
                if ($file_extension != 'xlsx' && $file_extension != 'xls')
                    return ['success' => false, 'message' => 'Vui lòng truyền vào là file excel'];

                if ($_FILES['import_excel']['size'] > $max_size) {
                    return ['success' => false, 'message' => 'Dung lượng file quá lớn , vui lòng truyền file excel nhỏ hơn 5 MB'];
                }

                $target_dir = 'upload/';
                $target_file = $target_dir . basename(time() . $fileName);
                move_uploaded_file($_FILES["import_excel"]["tmp_name"], $target_file);
            } else {
                return ['success' => false, 'message' => 'Vui lòng nhập file excel của bạn', 'data' => []];
            }

            try {
                $identify = PHPExcel_IOFactory::identify($target_file);
                $objReader = PHPExcel_IOFactory::createReader($identify);
                $objPHPExcel = $objReader->load($target_file);
                $objWorksheet = $objPHPExcel->getActiveSheet();
            } catch (Exception $exc) {
                die('Error loading file "' . pathinfo($fileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

            $rows = array();

            for ($col = 0; $col <= $highestColumnIndex; $col++) {
                for ($row = 1; $row <= $highestRow; $row++) {
                    if (strtolower($objWorksheet->getCellByColumnAndRow($col, 1)->getValue()) == 'email') {
                        $email = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                        $rows[$row][] = $email;
                    }
                }
            }
            unlink($target_file);

            $data = ['success' => true, 'message' => 'Tạo dữ liệu thành công', 'data' => $rows];
            return $data;
        }
    }

    /**
     * Bước 1 : Khởi tạo email trong database với dữ liệu truyền lên từ form
     */
    public function actionStep1() {
        $this->layout = false;
        try {
            $user = Yii::$app->user->getIdentity();
            if (empty($user)) {
                throw new Exception("Vui lòng đăng nhập trước khi thao tác");
            }
            $data = \Yii::$app->request->post();
            if (!empty($data)) {
                $result = $this->setUpData($user->user_id, $data);
                return $this->parseJson(true, "Khởi tạo dữ liệu thành công", $this->filterData($result));
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    /**
     * Bước 2 : Lưu template và tùy chỉnh giao diện
     */
    public function actionStep2() {
        header('Access-Control-Allow-Origin: *');
        try {
            $data = \Yii::$app->request->post();
            if (!empty($data) && !empty($data['id'])) {
                $email = EmailLog::findOne(['id' => $data['id']]);
                $template = Template::findOne(['id' => $data['tid']]);
                if (!empty($email)) {
                    $email->body = $template->template_content;
                    $email->updateTime = time();
                    $email->template_id = $data['tid'];
                    $email->step = $email->step > 3 ? $email->step : 3;
                    $result = $email->save(false);
                    if ($result) {
                        return $this->parseJson(true, "Chọn template thành công", $this->filterData($email));
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    /**
     * Bước 3 : Lưu template và xử lý bước cuối
     */
//    public function actionStep3() {
//        header('Access-Control-Allow-Origin: *');
//        try {
//            $data = \Yii::$app->request->post();
//            if (!empty($data) && !empty($data['id'])) {
//                $email = EmailLog::findOne(['id' => $data['id']]);
//                if (!empty($email)) {
//                    $email->updateTime = time();
//                    $email->step = 4;
//                    $result = $email->save(false);
//                    if ($result) {
//                        return $this->parseJson(true, "Lấy dữ liệu thành công", $this->filterData($email));
//                    }
//                }
//            }
//        } catch (Exception $exc) {
//            echo $exc->getMessage();
//        }
//    }

    public function actionStep4() {
        header('Access-Control-Allow-Origin: *');
        try {
            $data = \Yii::$app->request->post();
            if (!empty($data)) {
                $result = $this->sendMail($data['id']);
                return $result;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    /**
     * Lọc dữ liệu trả về , chỉ trả về những dữ liệu cần thiết.
     */
    private function filterData($data) {
        $object = new stdClass();
        $object->id = $data->id;
        $object->createTime = $data->createTime;
        return $object;
    }

    /**
     * Format dữ liệu trả về qua ajax thành định dạng JSON
     */
    private function parseJson($status, $message, $data) {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return array(
            "status" => $status, "message" => $message, "data" => $data
        );
    }

    private function sendChat($email, $dataAPI) {

        $listEmail = unserialize($email->list_email);
        $tokens = unserialize($email->token);
        $feedback_token = unserialize($email->feedback_token);
        $open_token = unserialize($email->token_open);

        $regex = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/";
        $send_success = 0;
        $bounce = 0;

        if (empty($email->sentTime)) {
            $totalRow = count($dataAPI);
            $k = 1;
            foreach ($dataAPI as $val) {
                $urlvetifined = $this->buildUrlChat($val, true);
                if (!empty($val->InfoTo)) {
                    if (preg_match($regex, $val->InfoTo->email) && preg_match($regex, $val->InfoFrom->email)) {
                        if (in_array($val->InfoTo->email, $listEmail)) {
                            $key = array_search($val->InfoTo->email, $listEmail);
                            $params = array();
                            $params['api_key'] = Yii::$app->params['mailer']['api_key'];
                            $params['from'] = 'support@muare.vn';
//                        $params['to'] = $val->InfoTo->email;
                            $params['to'] = 'huonghit08@gmail.com';
//                            $params['to'] = 'quang.nh94@gmail.com';
                            $params['subject'] = $val->InfoTo->name . ' bạn có tin nhắn mới từ người dùng ' . $val->InfoFrom->name;

                            $tokenUrl = Url::base('http') . '/useremail/unsubscribe?secret_key=' . $tokens[$key] . '&key_code=' . base64_encode($email->id) . '&type=unsubscribe';
                            $feedbackUrl = Url::base('http') . "/useremail/feedback?secret_key=" . $feedback_token[$key] . "&key_code=" . base64_encode($email->id) . "&type=feedback";
                            $openUrl = Url::base('http') . "/useremail/openemail?secret_key=" . $open_token[$key] . "&key_code=" . base64_encode($email->id) . "&type=open";

                            $body = $this->resolveBody($val, $tokenUrl, $feedbackUrl, $openUrl, true, 'zing', $urlvetifined);

                            if ($k == $totalRow) {
                                $email->handinput_list = $body;
                            }
                            $k++;
                            $params['body'] = $body;
                            $params['format'] = 'html';

                            $rs = $this->encode($params);

                            $result = $this->call('message/send', $rs);

                            $email->feedback = 0;
                            $email->unsubscribe = 0;

                            if ($result->result) {
                                $email->sentTime = time();
                                $send_success += 1;
                                $email->sent_success = $send_success;
                            } else {
                                $bounce += 1;
                                $email->bounce = $bounce;
                            }
//                            $email->sentTime = time();
                            $email->save(false);
//                            break;
                        }
                    }
                }
            }
            return true;
        } else {
            $listDataEmail = unserialize($email->body);
            foreach ($dataAPI as $val) {
                $urlvetifined = $this->buildUrlChat($val, false);
                if (!empty($val[0]->InfoTo)) {
                    if (preg_match($regex, $val[0]->InfoTo->email)) {
                        $key = array_search($val[0]->InfoTo->email, $listDataEmail);
                        $params = array();
                        $params['api_key'] = Yii::$app->params['mailer']['api_key'];
                        $params['from'] = 'support@muare.vn';
//                        $params['to'] = $val[0]->InfoTo->email;
                        $params['to'] = 'huonghit08@gmail.com';
//                        $params['to'] = 'quang.nh94@gmail.com';
                        $params['subject'] = '';
                        $i = 1;
                        if (count($val) > 2) {
                            foreach ($val as $key => $value) {
                                if ($i <= 2) {
                                    $params['subject'] .= $val[$key]->InfoFrom->name . ",";
                                }
                                $i++;
                            }
                            $params['subject'] .= ' cùng với ' . ((count($val) - 2) != 0 ? count($val) - 2 : 'nhiều') . ' người đã gửi tin nhắn cho bạn';
                        } else if (count($val) == 2) {
                            $params['subject'] = $val[0]->InfoFrom->name . ' cùng với 1 người đã gửi tin nhắn cho bạn';
                        } else if (count($val) == 1) {
                            $params['subject'] = 'Bạn nhân được tin nhắn từ 1 khách hàng';
                        }
                        $tokenUrl = Url::base('http') . '/useremail/unsubscribe?secret_key=' . $tokens['email-' . $key] . '&key_code=' . base64_encode($email->id) . '&type=unsubscribe';
                        $feedbackUrl = Url::base('http') . "/useremail/feedback?secret_key=" . $feedback_token['email-' . $key] . "&key_code=" . base64_encode($email->id) . "&type=feedback";
                        $openUrl = Url::base('http') . "/useremail/openemail?secret_key=" . $open_token['email-' . $key] . "&key_code=" . base64_encode($email->id) . "&type=open";

                        $body = $this->resolveBody($val, $tokenUrl, $feedbackUrl, $openUrl, true, 'zang', $urlvetifined);

                        $params['body'] = $body;
                        $params['format'] = 'html';

                        $rs = $this->encode($params);
                        $result = $this->call('message/send', $rs);
                        if ($result->result) {
                            $email->sentTime = time();
                            $email->sent_success += 1;
                        } else {
                            $email->bounce += 1;
                        }
                        $email->save(false);
//                        break;
                    }
                }
            }
        }
    }

    /**
     * Lấy dữ liệu từ form và xử lý khởi tạo bản ghi mới trong bảng EmailLogs
     */
    private function setUpData($userId, $form) {
        $email = [];
        $email2 = [];

        if (isset($form['listEmail'])) {
            $form['listEmail'] = array_unique($form['listEmail']);
        } else {
            $form['listEmail'] = [];
        }

        if (isset($form['listHand'])) {
            $form['listHand'] = array_unique($form['listHand']);
        } else {
            $form['listHand'] = [];
        }

        //render all token
        $feedback = $this->bornToken($form['listEmail'], 'feedback', $form['listHand']);
        $open = $this->bornToken($form['listEmail'], 'open', $form['listHand']);
        $unscrub = $this->bornToken($form['listEmail'], 'unscriable', $form['listHand']);

        $log = EmailLog::findOne(['id' => $form['id']]);
        if (empty($log)) {
            $log = new EmailLog();
            $log->createTime = time();
        }
        if (!empty($form)) {
            $log->subject = $form['subject'];
            $log->from = 'support@muare.vn';
            $log->updateTime = time();
            $log->step = $log->step > 2 ? $log->step : 2;
            $log->user_id = $userId;
            foreach ($form['listEmail'] as $key => $mail) {
                $email['email-' . $key] = $mail;
            }
            $log->list_email = serialize($email);

            foreach ($form['listHand'] as $key => $mail) {
                $email2['kemail-' . $key] = $mail;
            }
            $log->handinput_list = serialize($email2);
            $log->total_email = count($email);
            $log->feedback_token = $feedback;
            $log->token_open = $open;
            $log->token = $unscrub;
            $log->save(false);
            return $log;
        }
    }

    /**
     * Tự động tạo Token với các token truyền vào.
     */
    private function bornToken($list, $type, $list2 = null) {
        $token = [];
        switch ($type) {
            case 'feedback' :
                if (!empty($list)) {
                    foreach ($list as $key => $mail) {
                        $token['email-' . $key] = base64_encode($mail . '-' . time() . '-' . $this->lotoNumber(7));
                    }
                }

                if (!empty($list2)) {
                    foreach ($list2 as $key => $mail) {
                        $token['kemail-' . $key] = base64_encode($mail . '-' . time() . '-' . $this->lotoNumber(7));
                    }
                }
                break;
            case 'open' :
                if (!empty($list)) {
                    foreach ($list as $key => $mail) {
                        $token['email-' . $key] = base64_encode(time() . '-' . $mail . '-' . $this->lotoNumber(10));
                    }
                }
                if (!empty($list2)) {
                    foreach ($list2 as $key => $mail) {
                        $token['kemail-' . $key] = base64_encode($mail . '-' . time() . '-' . $this->lotoNumber(7));
                    }
                }
                break;
            case 'unscriable' :
                if (!empty($list)) {
                    foreach ($list as $key => $mail) {
                        $token['email-' . $key] = base64_encode($mail . '-' . $this->lotoNumber(4) . '-' . time());
                    }
                }
                if (!empty($list2)) {
                    foreach ($list2 as $key => $mail) {
                        $token['kemail-' . $key] = base64_encode($mail . '-' . time() . '-' . $this->lotoNumber(7));
                    }
                }
                break;
        }
        return serialize($token);
    }

    /**
     * Sổ số đen đỏ.
     */
    private function lotoNumber($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Xử lý sendEmail
     */
    private function sendMail($id) {
        $log = EmailLog::getById($id);
        $log->total_email = 0;

        try {
            if (!empty($log)) {
                $emails = unserialize($log->list_email);
                $tokens = unserialize($log->token);
                $emails2 = unserialize($log->handinput_list);
                $feedback_token = unserialize($log->feedback_token);
                $open_token = unserialize($log->token_open);
                $send_success = 0;
                $bounce = 0;

                $emails = array_merge($emails, $emails2);

                foreach ($emails as $key => $email) {
                    $params = array();
                    $params['api_key'] = Yii::$app->params['mailer']['api_key'];
                    $params['from'] = 'support@muare.vn';
                    $params['to'] = $email;
                    $params['subject'] = $log->subject;

                    $tokenUrl = Url::base('http') . '/useremail/unsubscribe?secret_key=' . $tokens[$key] . '&key_code=' . base64_encode($id) . '&type=unsubscribe';
                    $feedbackUrl = Url::base('http') . "/useremail/feedback?secret_key=" . $feedback_token[$key] . "&key_code=" . base64_encode($id) . "&type=feedback";
                    $openUrl = Url::base('http') . "/useremail/openemail?secret_key=" . $open_token[$key] . "&key_code=" . base64_encode($id) . "&type=open";

                    $body = $this->resolveBody($log->body, $tokenUrl, $feedbackUrl, $openUrl);

                    $params['body'] = $body;
                    $params['format'] = 'html';

                    $rs = $this->encode($params);

                    $result = $this->call('message/send', $rs);

                    $log->feedback = 0;
                    $log->unsubscribe = 0;
                    $log->total_email += 1;
                    $log->roleMail = 'normal';

                    if ($result->result) {
                        $log->sentTime = time();
                        $send_success += 1;
                        $log->sent_success = $send_success;
                    } else {
                        $bounce += 1;
                        $log->bounce = $bounce;
                    }
                    $log->step = 5;
                    $log->save(false);
                }

                return $this->parseJson(true, "Gửi email thành công", []);
            }
        } catch (Exception $exc) {
            print_r($exc->getMessage());
        }
    }

    /**
     * Xử lý body được truyền vào
     */
    private function resolveBody($body, $token = null, $feedback = null, $open = null, $chat = false, $zingorzang = null, $urlvetifined = null) {
        if ($feedback != null) {
//            $regex = '/https?\:\/\/[^\" ]+/i';
            if (!$chat) {
                $regex = '#[-a-zA-Z0-9@:%_\+.~\#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~\#?&//=]*)?#si';
                preg_match_all($regex, $body, $links);

                if (!empty($links)) {
                    foreach ($links[0] as $link) {
                        $body = str_replace('href="' . $link . '"', 'href="' . $feedback . '&base=' . $link . '"', $body);
                    }

                    $data = [
                        'body' => $body,
                        'token' => $token,
                        'open_token' => $open,
                    ];

                    return $this->renderTemplate('email/mail', ['data' => $data]);
                }
            } else {
                $totalm = 0;
                if (!empty($body->historyChat)) {
                    foreach ($body->historyChat as $val) {
                        $totalm += 1;
                    }
                }

                $data = [
                    'body' => $body,
                    'token' => $token,
                    'open_token' => $open,
                    'feedback' => $feedback . '&base=http://muare3.todo.vn' . $urlvetifined,
                    'zingorzang' => $zingorzang,
                    'totalm' => $totalm
                ];

                return $this->renderTemplate('email/chatmail', ['data' => $data]);
            }
        }
    }

    /**
     * Endcode json
     * @param type $data
     * @return type
     * @throws Exception
     */
    private function encode($data) {
        if (is_array($data)) {
            return json_encode($data);
        }
        throw new Exception("Vui lòng truyền vào một mảng dữ liệu");
    }

    /**
     * Xử lý template
     * @param type $view
     * @param type $params
     * @param type $layout
     * @return type
     */
    private function renderTemplate($view, $params = []) {
        $mail = new Mailer();
        return $mail->render('emailtemplate/' . $view, $params);
    }

    /**
     * Xử lý thông tin khi người dùng click vào link trả về tương ứng
     * @throws Exception
     */
    private function resovelClick() {
        $secret_key = \Yii::$app->request->get('secret_key');
        $id = base64_decode(\Yii::$app->request->get('key_code'));

        $type = \Yii::$app->request->get('type');

        if (isset($type)) {

            switch ($type) {
                case 'unsubscribe' :
                    $this->unsubscribe($secret_key, $id);
                    break;
                case 'feedback' :
                    $this->feedback($secret_key, $id);
                    break;
                case 'open' :
                    $this->open($secret_key, $id);
                    break;
                default :
                    throw new Exception("Không tồn tại kiểu email tương ứng");
                    break;
            }
        }
    }

    /**
     * Xử lý open
     * @param type $secret_key
     * @param type $id
     */
    private function open($secret_key, $id) {
        if ($secret_key != null && $secret_key != '') {
            $log = EmailLog::getById($id);
            if ($log->token_open_accept == '' && $log->token_open_accept == null) {
                $like = unserialize($log->token_open);
                if (!in_array($secret_key, $like)) {
                    echo "Không chính xác, vui lòng kiểm tra lại secret_key";
                } else {
                    $token = [];
                    $token[] = $secret_key;
                    $log->open_total += 1;
                    $log->token_open_accept = serialize($token);
                    $log->save(false);

                    $baseRouter = \Yii::$app->request->get('base');
                    return $this->redirect($baseRouter);
                }
            } else {
                $token = unserialize($log->token_open_accept);
                if (in_array($secret_key, $token)) {
                    $baseRouter = \Yii::$app->request->get('base');
                    return $this->redirect($baseRouter);
                } else {
                    $like = unserialize($log->token_open);
                    if (!in_array($secret_key, $like)) {
                        echo "Không chính xác, vui lòng kiểm tra lại secret_key";
                    } else {
                        $token[] = $secret_key;
                        $log->open_total += 1;
                        $log->token_open_accept = serialize($token);
                        $log->save(false);
                        $baseRouter = \Yii::$app->request->get('base');
                        return $this->redirect($baseRouter);
                    }
                }
            }
        }
    }

    /**
     * Xử lý feedback
     * @param type $secret_key
     * @param type $id
     */
    private function feedback($secret_key, $id) {
        if ($secret_key != null && $secret_key != '') {
            $log = EmailLog::getById($id);
            if ($log->feedback_token_accept == '' && $log->feedback_token_accept == null) {
                $like = unserialize($log->feedback_token);
                if (!in_array($secret_key, $like)) {
                    echo "Sai key , vui lòng kiểm tra lại";
                } else {
                    $token = [];
                    $token[] = $secret_key;
                    $log->feedback += 1;
                    $log->feedback_token_accept = serialize($token);
                    $log->save(false);
                    $baseRouter = \Yii::$app->request->get('base');
                    return $this->redirect($baseRouter);
                }
            } else {
                $token = unserialize($log->feedback_token_accept);
                if (in_array($secret_key, $token)) {
                    $baseRouter = \Yii::$app->request->get('base');
                    return $this->redirect($baseRouter);
                } else {
                    $like = unserialize($log->feedback_token);
                    if (!in_array($secret_key, $like)) {
                        echo "Sai key , vui lòng kiểm tra lại";
                    } else {
                        $token[] = $secret_key;
                        $log->feedback += 1;
                        $log->feedback_token_accept = serialize($token);
                        $log->save(false);
                        $baseRouter = \Yii::$app->request->get('base');
                        return $this->redirect($baseRouter);
                    }
                }
            }
        }
    }

    /**
     * Xử lý unsubscribe
     * @param type $secret_key
     * @param type $id
     */
    private function unsubscribe($secret_key, $id) {
        if ($secret_key != null && $secret_key != '') {
            $log = EmailLog::getById($id);
            if ($log->token_accept == '' && $log->token_accept == null) {
                $like = unserialize($log->token);
                if (!in_array($secret_key, $like)) {
                    echo "Sai key , vui lòng kiểm tra lại";
                } else {
                    $token = [];
                    $token[] = $secret_key;
                    $log->unsubscribe += 1;
                    $log->token_accept = serialize($token);
                    $log->save(false);
                    echo "<script type='text/javascript'>window.close();</script>";
                }
            } else {
                $token = unserialize($log->token_accept);
                if (in_array($secret_key, $token)) {
                    echo "<script type='text/javascript'>window.close();</script>";
                } else {
                    $like = unserialize($log->token);
                    if (!in_array($secret_key, $like)) {
                        echo "Sai key , vui lòng kiểm tra lại";
                    } else {
                        $token[] = $secret_key;
                        $log->unsubscribe += 1;
                        $log->token_accept = serialize($token);
                        $log->save(false);
                        echo "<script type='text/javascript'>window.close();</script>";
                    }
                }
            }
        }
    }

    /**
     * Phản hồi từ khách hàng
     */
    public function actionFeedback() {
        $this->resovelClick();
    }

    /**
     * Khách hàng từ chối nhận email
     */
    public function actionUnsubscribe() {
        $this->resovelClick();
    }

    /**
     * Check mở email
     */
    public function actionOpenemail() {
        $this->resovelClick();
    }

    private function buildUrlChat($data, $single = true) {
        $regex = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/';
        $token = null;
        if ($single && !empty($data)) {
            $arr = [];
            if (!empty($data->InfoFrom->email) && !empty($data->InfoTo->email)) {
                if (preg_match($regex, $data->InfoFrom->email) && preg_match($regex, $data->InfoTo->email)) {
                    $arr['emailFrom'] = ["mail-1" => $data->InfoFrom->email];
                    $arr['emailTo'] = $data->InfoTo->email;
                    $token = $this->createSecretKey($arr);
                }
            }
        } else {
            if (is_array($data)) {
                $arr = [];
                $arr2 = [];
                if (preg_match($regex, $data[0]->InfoTo->email)) {
                    $arr = ["emailTo" => $data[0]->InfoTo->email];
                }
                $i = 0;
                foreach ($data as $value) {
                    if (preg_match($regex, $value->InfoFrom->email)) {
                        $arr2["mail-" . $i] = $value->InfoFrom->email;
                    }
                    $i++;
                }

                $arr["emailFrom"] = $arr2;
                $token = $this->createSecretKey($arr);
            }
        }
        return $token;
    }

    /**
     * Xây dựng key bảo mật
     */
    private function createSecretKey($data) {
        $token = '?verify=' . base64_encode(json_encode($data)) . ',' . sha1(time());
        return $token;
    }

    public function actionTestsend() {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $request = Yii::$app->request->post();
        $currentDate = '';
        $query = EmailLog::find();
        if ($request['date'] != null) {
            $currentDate = $request['date'];
            $request['date'] = str_replace('/', '-', $request['date']);
            $request['date'] = date('Y-m-d', strtotime($request['date']));

            $query->andWhere(['between', 'sentTime', strtotime($request['date']), strtotime($request['date']) + (23 * 3600)]);
        }

        $email = $query->one();

        $params = array();
        $params['api_key'] = Yii::$app->params['mailer']['api_key'];
        $params['from'] = 'support@muare.vn';

        $params['subject'] = 'Giao diện thư ngày ' . $currentDate;
        $params['body'] = $email->handinput_list;
        $params['format'] = 'html';

        if (!empty($request['email'])) {
            $mail = explode(',', $request['email']);
            foreach ($mail as $val) {
                $params['to'] = $val;
                $rs = $this->encode($params);
                $this->call('message/send', $rs);
            }
        }

        $data = ['data' => [], 'message' => 'Gửi email thành công', 'status' => true];
        return $data;
    }

    /**
     * Xóa dữ liệu log tương ứng với người dùng và ID
     */
    public function actionDelete() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $user = Yii::$app->user->getIdentity();
        if ($user == null) {
            return ['status' => false, 'message' => 'Vui lòng đăng nhập trước khi thao tác', 'data' => []];
        }
        $request = \Yii::$app->request->post();
        $email = EmailLog::getById($request['id']);
        if ($email->user_id == $user->user_id) {
            $result = EmailLog::deleteAll(['id' => $email->id]);
            if ($result) {
                return ['status' => true, 'message' => 'Dữ liệu đã xóa , vui lòng tải lại', 'data' => []];
            }
        } else {
            return ['status' => false, 'message' => 'Thao tác thất bại vui lòng thử lại', 'data' => []];
        }
    }

    /**
     * So sánh dữ liệu các ngày trong biểu đồ dữ liệu.
     */
    public function actionFindbychart() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $user = Yii::$app->user->getIdentity();
        if ($user == null) {
            return ['status' => false, 'message' => 'Vui lòng đăng nhập trước khi thao tác', 'data' => []];
        }
        $request = \Yii::$app->request->post();
        $email = EmailLog::getById($request['id']);
        if ($email->user_id == $user->user_id) {
            $search = new EmailSearch();
            $search->sentTimeFrom = $request['date'];
            $search->roleMail = 'normal';
            $search->step = 5;
            $search->user_id = $email->user_id;

            $query = EmailLog::filter($search);
            $query = $query->all();

            if (!empty($query)) {
                $arrReturn = [];
                foreach ($query as $val) {
                    $arrReturn[] = ['open' => $val->open_total, 'feedback' => $val->feedback, 'bounce' => $val->bounce, 'unsubscribe' => $val->unsubscribe, 'sentTime' => \Yii::$app->formatter->asDatetime($val->sentTime, 'php:H:i:s d-m-Y')];
                }
                return ['status' => true, 'message' => 'Lấy dữ liệu thành công', 'data' => $arrReturn];
            } else {
                return ['status' => false, 'message' => 'Dữ liệu không tồn tại', 'data' => []];
            }
        } else {
            return ['status' => false, 'message' => 'Thao tác thất bại vui lòng thử lại', 'data' => []];
        }
    }

    /**
     * Download xsls từ server
     */
    public function actionDownload() {
        $filename = dirname(__DIR__) . '/web/file/example.xlsx';
        $fp = fopen($filename, "rb");

        header("Content-type: application/octet-stream");
        header("Content-length: " . filesize($filename));
        header('Content-disposition: attachment; filename="example.xlsx"');

        fpassthru($fp);
        fclose($fp);
    }

}
