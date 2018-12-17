<?php

use yii\db\Migration;

class m171014_172521_creat_post extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m171014_172521_creat_post cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('post',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string(),
            'description'=>$this->text(),
            'user_id'=>$this->integer(),
        ]);
    }

    public function down()
    {
        echo "m171014_172521_creat_post cannot be reverted.\n";

        return false;
    }

}
