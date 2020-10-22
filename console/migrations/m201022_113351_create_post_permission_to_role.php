<?php

use yii\db\Migration;

/**
 * Class m201022_113351_create_post_permission_to_role
 */
class m201022_113351_create_post_permission_to_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        
        // get role
        $author = $auth->getRole('author');
        $admin = $auth->getRole('admin');
        $superAdmin = $auth->getRole('super-admin');

        //get Permission
        $listPost = $auth->getPermission('post-index');
        $createPost = $auth->getPermission('post-create');
        $deletePost = $auth->getPermission('post-delete');
        $updatePost = $auth->getPermission('post-update');
        $viewPost = $auth->getPermission('post-view');

        //assign
        $auth->addChild($author,$createPost);
        $auth->addChild($author,$listPost);
        $auth->addChild($author,$viewPost);
        $auth->addChild($author,$updatePost);

        $auth->addChild($admin,$author);

        $auth->addChild($superAdmin,$admin);
        $auth->addChild($superAdmin,$deletePost);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201022_113351_create_post_permission_to_role cannot be reverted.\n";
        $auth = Yii::$app->authManager;

        //Permission
        $listPost = $auth->getPermission('post-index');
        if($listPost){
            $auth->remove($listPost);
        }

        $createPost = $auth->getPermission('post-create');
        if($createPost){
            $auth->remove($createPost);
        }

        $deletePost = $auth->getPermission('post-delete');
        if($deletePost){
            $auth->remove($deletePost);
        }

        $updatePost = $auth->getPermission('post-update');
        if($deletePost){
            $auth->remove($deletePost);
        }

        $viewPost = $auth->getPermission('post-view');
        if($viewPost){
            $auth->remove($viewPost);
        }


        //Role
        // $author = $auth->getPermission('post-update');
        // if($author){
        //     $auth->remove($author);
        // }

        // $admin = $auth->getPermission('author');
        // if($admin){
        //     $auth->remove($admin);
        // }

        // $superAdmin = $auth->getPermission('admin');
        // if($superAdmin){
        //     $auth->remove($superAdmin);
        // }

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_113351_create_post_permission_to_role cannot be reverted.\n";

        return false;
    }
    */
}
