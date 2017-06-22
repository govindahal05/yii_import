<?php

/**
 * This is the model class for table "subject".
 *
 * The followings are the available columns in table 'subject':
 * @property integer $SUBJ_ID
 * @property string $SUBJ_CODE
 * @property string $SUBJ_DESCRIPTION
 * @property integer $UNIT
 * @property string $PRE_REQUISITE
 * @property integer $COURSE_ID
 * @property string $AY
 * @property string $SEMESTER
 */
class Subject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SUBJ_CODE, SUBJ_DESCRIPTION, UNIT, COURSE_ID, AY, SEMESTER', 'required'),
			array('UNIT, COURSE_ID', 'numerical', 'integerOnly'=>true),
			array('SUBJ_CODE, PRE_REQUISITE, AY', 'length', 'max'=>30),
			array('SUBJ_DESCRIPTION', 'length', 'max'=>255),
			array('SEMESTER', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('SUBJ_ID, SUBJ_CODE, SUBJ_DESCRIPTION, UNIT, PRE_REQUISITE, COURSE_ID, AY, SEMESTER', 'safe', 'on'=>'search'),
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
			'SUBJ_ID' => 'Subj',
			'SUBJ_CODE' => 'Subj Code',
			'SUBJ_DESCRIPTION' => 'Subj Description',
			'UNIT' => 'Unit',
			'PRE_REQUISITE' => 'Pre Requisite',
			'COURSE_ID' => 'Course',
			'AY' => 'Ay',
			'SEMESTER' => 'Semester',
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

		$criteria->compare('SUBJ_ID',$this->SUBJ_ID);
		$criteria->compare('SUBJ_CODE',$this->SUBJ_CODE,true);
		$criteria->compare('SUBJ_DESCRIPTION',$this->SUBJ_DESCRIPTION,true);
		$criteria->compare('UNIT',$this->UNIT);
		$criteria->compare('PRE_REQUISITE',$this->PRE_REQUISITE,true);
		$criteria->compare('COURSE_ID',$this->COURSE_ID);
		$criteria->compare('AY',$this->AY,true);
		$criteria->compare('SEMESTER',$this->SEMESTER,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
