<?php

/**
 * This is the model class for table "b2b".
 *
 * The followings are the available columns in table 'b2b':
 * @property integer $id
 * @property string $dodano
 * @property string $edytowano
 * @property string $tytul
 * @property string $miejsce
 * @property string $obowiazki
 * @property string $wymagania
 * @property string $oferujemy
 * @property string $opis
 * @property integer $publikacja
 * @property integer $glowna
 * @property integer $czas_publikacji
 */
class b2back extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return b2back the static model class
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
		return 'b2b';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tytul, miejsce', 'required'),
			array('publikacja, glowna, czas_publikacji', 'numerical', 'integerOnly'=>true),
			array('tytul, miejsce', 'length', 'max'=>128),
			array('edytowano, obowiazki, wymagania, oferujemy, opis', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dodano, edytowano, tytul, miejsce, obowiazki, wymagania, oferujemy, opis, publikacja, glowna, czas_publikacji', 'safe', 'on'=>'search'),
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
			'edytowano' => 'Edytowano',
			'tytul' => 'Tytul',
			'miejsce' => 'Miejsce',
			'obowiazki' => 'Obowiazki',
			'wymagania' => 'Wymagania',
			'oferujemy' => 'Oferujemy',
			'opis' => 'Opis',
			'publikacja' => 'Publikacja',
			'glowna' => 'Glowna',
			'czas_publikacji' => 'Czas Publikacji',
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
		$criteria->compare('edytowano',$this->edytowano,true);
		$criteria->compare('tytul',$this->tytul,true);
		$criteria->compare('miejsce',$this->miejsce,true);
		$criteria->compare('obowiazki',$this->obowiazki,true);
		$criteria->compare('wymagania',$this->wymagania,true);
		$criteria->compare('oferujemy',$this->oferujemy,true);
		$criteria->compare('opis',$this->opis,true);
		$criteria->compare('publikacja',$this->publikacja);
		$criteria->compare('glowna',$this->glowna);
		$criteria->compare('czas_publikacji',$this->czas_publikacji);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}