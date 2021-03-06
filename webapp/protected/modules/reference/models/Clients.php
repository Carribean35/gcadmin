<?php

/**
 * This is the model class for table "clients".
 *
 * The followings are the available columns in table 'clients':
 * @property integer $id
 * @property string $nik
 * @property string $tel
 * @property string $email
 * @property string $id_diskont
 * @property string $password
 * @property tinyint $state
 * @property string $token
 */
class Clients extends EActiveRecord
{
	
	// отдаём соединение, описанное в компоненте db_vsht
    public function getDbConnection(){
        return Yii::app()->db_vsht;
    }
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'volga_google.clients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nik', 'required'),
			array('tel, email', 'safe')
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
//			array('id, name, name2, createDate, text, visible', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'discounts_cart'=>array(self::BELONGS_TO, 'DiscountsCart', 'id_diskont'),
			'orders'=>array(self::HAS_MANY, 'Order', 'client'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('main', 'ID'),
			'nik' => Yii::t('main', 'Nic'),
			'tel' => Yii::t('main', 'Phone'),
			'email' => Yii::t('main', 'Email'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nik',$this->nik,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('email',$this->email,true);
		$criteria->with = array('discounts_cart');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
