<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "taxpayer".
 *
 * @property int $taxpayer_id
 * @property string $full_name
 * @property string $contact_no
 * @property string $gender
 * @property string $occupation
 * @property string $address
 * @property string $payment_status
 */
class Taxpayer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taxpayer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['first_name', 'middle_name', 'last_name', 'contact_no', 'gender', 'occupation', 'address', 'payment_status'], 'required'],
            [['full_name'], 'required'],
            [['full_name'], 'string', 'max' => 255],
            [['contact_no'], 'string', 'max' => 15],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 20],
            [['gender', 'occupation', 'address', 'payment_status'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'taxpayer_id' => 'Taxpayer ID',
            'full_name' => 'Full Name',
            'contact_no' => 'Contact No',
            'gender' => 'Gender',
            'occupation' => 'Occupation',
            'address' => 'Address',
            'payment_status' => 'Payment Status',
        ];
    }
}
