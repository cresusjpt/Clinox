<?php

use yii\db\Migration;

class m171012_162331_rbac_init extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m171012_162331_rbac_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171012_162331_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
