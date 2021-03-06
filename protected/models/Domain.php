<?php

/**
 * This is the model class for table "t_domain".
 *
 * The followings are the available columns in table 't_domain':
 * @property integer $id
 * @property string $domain
 * @property integer $grade
 * @property string $image
 * @property string $create_time
 */
class Domain extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Domain the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_domain';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('domain, create_time', 'required'),
			array('grade', 'numerical', 'integerOnly'=>true),
			array('domain', 'length', 'max'=>128),
			array('image', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, domain, grade, image, create_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'domain' => 'Domain',
			'grade' => 'Grade',
			'image' => 'Image',
			'create_time' => 'Create Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('domain',$this->domain,true);
		$criteria->compare('grade',$this->grade);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->order = 'grade asc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}