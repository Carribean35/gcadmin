<?php

/**
 * This is the model class for table "web_zakaz".
 *
 * The followings are the available columns in table 'web_zakaz':
 * @property integer $id
 * @property integer $workerId
 * @property datetime $date
 * @property string $comment
 */
class Order extends EActiveRecord
{
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment', 'length', 'max' => 255),
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
			'worker'=>array(self::BELONGS_TO, 'Worker', 'workerId'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('main', 'ID'),
			'date' => Yii::t('main', 'Date'),
			'comment' => Yii::t('main', 'Comment'),
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

		$worker = "";
		if (!empty($_GET['NewOrders'])) {
			if (!empty($_GET['NewOrders']['worker']))
				$worker = $_GET['NewOrders']['worker'];
		}
		
		
		$criteria->compare('id',$this->id);
		$criteria->compare('worker.fio',$worker,true);
		$criteria->with = array('worker' => array());

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
	
	public function getOrderAmount() {
		/*$connection = Yii::app()->db_vsht;
		$command = $connection->createCommand('SELECT SUM( cen ) amount FROM  `web_zakaz_tabl` WHERE  `id_zakaza` = :id_zakaza');
		$command->params = array(':id_zakaza' => $this->id);
		$row = $command->queryRow();
		return $row['amount'];*/
	}
}
