<?php


class TestController extends Controller
{

    public function actionIndex()
    {
        $post=new Post();
        $post->title=Yii::app()->request->getQuery('title');
        $post->content=Yii::app()->request->getQuery('content');
        $post->create_time=time();
        if($post->save()){
            echo "添加成功";
        }else{
            echo "添加失败";
        }

    }

    public function actionFind()
    {
        $post=Post::model()->find('id=:id',array(':id'=>1));
        echo $post->title;
    }

    public function actionUpdate()
    {
        $post=Post::model()->findByPk(Yii::app()->request->getQuery('id'));
        $post->title='hello world';
        if($post->save()){
            echo "更新成功";
        }else{
            echo "更新失败";
        }
    }

    public function actionRelation()
    {
//        $post=Post::model()->findByPK(1);
//        $user=$post->user;
//        var_dump($user->email);
//        var_dump($post->content);
//        $user=User::model()->findByPK(1);
//        $posts=$user->posts;
//        var_dump($posts[2]->title);
        $posts=Post::model()->with('user')->findAll();
        var_dump($posts[1]->user->username);
//        $posts=Post::model()->with('user','categories')->findAll();
//        var_dump($posts[1]->categories);
    }

    public function actionService()
    {
        $client=new SoapClient('http://localhost/yii_web/yii_test/index.php/stock/quote');
        echo $client->getPrice('Google');
    }

}