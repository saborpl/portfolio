<?php

/**
 * This is the model class for table "ogloszenia".
 *
 * The followings are the available columns in table 'ogloszenia':
 * @property integer $id
 * @property string $dodano
 * @property string $edytowano
 * @property string $tytul
 * @property string $kategoria
 * @property string $stan
 * @property string $opis
 * @property string $cena
 * @property integer $publikacja
 * @property integer $czas_publikacji
 * @property string $zdjecie1
 * @property string $zdjecie2
 * @property string $zdjecie3
 * @property string $zdjecie4
 * @property string $zdjecie5
 * @property string $zdjecie6
 * @property integer $id_users
 * @property integer $id_platnosc
 */
class Ogback extends CActiveRecord
{
	
	//public $image;
    public $file;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ogback the static model class
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
		return 'ogloszenia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		
			array('image, zdjecie1, zdjecie2, zdjecie3, zdjecie4, zdjecie5, zdjecie6', 'file', 'types'=>'jpg, gif, png, jpeg', 'allowEmpty'=>true),
			array('file', 'file', 'types'=>'zip, rar', 'allowEmpty'=>true),		
		
			array('tytul, kategoria, publikacja, id_users, id_platnosc', 'required'),
			array('glowna, premium, publikacja, czas_publikacji, id_users, id_platnosc', 'numerical', 'integerOnly'=>true),
			array('tytul, kategoria, stan', 'length', 'max'=>128),
			array('cena', 'length', 'max'=>10),
			array('edytowano, opis', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dodano, edytowano, tytul, kategoria, stan, opis, cena, glowna, premium, publikacja, czas_publikacji, zdjecie1, zdjecie2, zdjecie3, zdjecie4, zdjecie5, zdjecie6, id_users, id_platnosc', 'safe', 'on'=>'search'),
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
			'kategoria' => 'Kategoria',
			'stan' => 'Stan',
			'opis' => 'Opis',
			'cena' => 'Cena',
			'publikacja' => 'Publikacja',
			'glowna' => 'Wyświetlić na stronie głównej?',
			'premium' => 'Ogłoszenie premium?',
			'czas_publikacji' => 'Czas Publikacji',
			'zdjecie1' => 'Zdjecie Premium rozmiar: 960px320px',
			'zdjecie2' => 'miniatura na stronie glownej: 100x100px',
			'zdjecie3' => 'Zdjecie3',
			'zdjecie4' => 'Zdjecie4',
			'zdjecie5' => 'Zdjecie5',
			'zdjecie6' => 'Zdjecie6',
			'id_users' => 'Id Users',
			'id_platnosc' => 'Id Platnosc',
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
		$criteria->compare('kategoria',$this->kategoria,true);
		$criteria->compare('stan',$this->stan,true);
		$criteria->compare('opis',$this->opis,true);
		$criteria->compare('cena',$this->cena,true);
		$criteria->compare('publikacja',$this->publikacja);
		$criteria->compare('glowna',$this->glowna);
		$criteria->compare('premium',$this->premium);
		$criteria->compare('czas_publikacji',$this->czas_publikacji);
		$criteria->compare('zdjecie1',$this->zdjecie1,true);
		$criteria->compare('zdjecie2',$this->zdjecie2,true);
		$criteria->compare('zdjecie3',$this->zdjecie3,true);
		$criteria->compare('zdjecie4',$this->zdjecie4,true);
		$criteria->compare('zdjecie5',$this->zdjecie5,true);
		$criteria->compare('zdjecie6',$this->zdjecie6,true);
		$criteria->compare('id_users',$this->id_users);
		$criteria->compare('id_platnosc',$this->id_platnosc);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}