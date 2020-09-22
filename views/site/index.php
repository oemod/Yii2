<style>
    ul{
        float: left;
        width: 200px;
    }
    li{
        list-style: none;
    }
    .khung{
        float: left;
        border: 1px solid;
        padding: 50px;
    }
</style>


<ul>
    <?php foreach($model as $value){?>
    <li><a href="javascript:" onclick="chatSocket.newsRoom('<?=$value->id?>','<?=$value->username?>','<?=Yii::$app->user->identity->id?>','<?=Yii::$app->user->identity->username?>')" ><?=$value->username?></a></li>
    <?php }?>
</ul>

<div class="khung1"> Khung Chát</div>

<div id="room"></div>
<script>
    var auth=<?=Yii::$app->user->identity->id?>
</script>

