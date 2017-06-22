<?php

/**
 * This is the model class for table "dzialy".
 *
 * The followings are the available columns in table 'dzialy':
 * @property integer $id
 * @property string $dodano
 * @property string $zmieniono
 * @property string $autor
 * @property string $tytul
 * @property string $tytul_skrot
 * @property string $tresc
 * @property string $metaTitle
 * @property string $metaKeywords
 * @property string $metaDescription
 */
class Dzback extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dzback the static model class
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
		return 'dzialy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('autor, tytul, tytul_skrot, tresc, metaTitle, metaKeywords, metaDescription', 'required'),
			array('zmieniono, autor, tytul, tytul_skrot, metaTitle, metaKeywords', 'length', 'max'=>128),
			array('metaDescription', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dodano, zmieniono, autor, tytul, tytul_skrot, tresc, metaTitle, metaKeywords, metaDescription', 'safe', 'on'=>'search'),
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
			'dodano' => 'Dodano',
			'zmieniono' => 'Zmieniono',
			'autor' => 'Autor',
			'tytul' => 'Tytul',
			'tytul_skrot' => 'Tytuł skrócony',
			'tresc' => 'Tresc',
			'metaTitle' => 'Meta Title',
			'metaKeywords' => 'Meta Keywords',
			'metaDescription' => 'Meta Description',
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
		$criteria->compare('dodano',$this->dodano,true);
		$criteria->compare('zmieniono',$this->zmieniono,true);
		$criteria->compare('autor',$this->autor,true);
		$criteria->compare('tytul',$this->tytul,true);
		$criteria->compare('tytul_skrot',$this->tytul_skrot,true);
		$criteria->compare('tresc',$this->tresc,true);
		$criteria->compare('metaTitle',$this->metaTitle,true);
		$criteria->compare('metaKeywords',$this->metaKeywords,true);
		$criteria->compare('metaDescription',$this->metaDescription,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}