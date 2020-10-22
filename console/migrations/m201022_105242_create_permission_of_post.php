<?php

use yii\db\Migration;

/**
 * Class m201022_105242_create_permission_of_post
 */
class m201022_105242_create_permission_of_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $create = $auth->createPermission('post-create');
        $create->description = 'Create a post';
        $auth->add($create);

        $index = $auth->createPermission('post-index');
        $index->description = 'List a post';
        $auth->add($index);

        $view = $auth->createPermission('post-view');
        $view->description = 'View a post';
        $auth->add($view);

        $delete = $auth->createPermission('post-delete');
        $delete->description = 'Delete a post';
        $auth->add($delete);

        $update = $auth->createPermission('post-update');
        $update->description = 'Update a post';
        $auth->add($update);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201022_105242_create_permission_of_post cannot be reverted.\n";
        $auth = Yii::$app->authManager;

        $create = $auth->getPermission('post-create');
        if($create){
            $auth->remove($create);
        }

        $index = $auth->getPermission('post-index');
        if($index){
            $auth->remove($index);
        }

        $view = $auth->getPermission('post-view');
        if($view){
            $auth->remove($view);
        }

        $delete = $auth->getPermission('post-delete');
        if($delete){
            $auth->remove($delete);
        }

        $update = $auth->getPermission('post-update');
        if($update){
            $auth->remove($update);
        }

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_105242_create_permission_of_post cannot be reverted.\n";

        return false;
    }
    */
}
