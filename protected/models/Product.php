<?php

/**
 * This is the model class for table "tbl_product".
 *
 * The followings are the available columns in table 'tbl_product':
 * @property integer $id
 * @property integer $category_id
 * @property string $sku
 * @property integer $made_from_id
 * @property string $prod_name
 * @property string $short_description
 * @property string $detail
 * @property string $tags
 * @property string $price
 * @property string $old_price
 * @property integer $in_stock
 * @property integer $min_stock
 * @property integer $option_product
 * @property string $shipping_policy
 * @property integer $feature
 * @property integer $status
 * @property integer $popular
 * @property string $date
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, made_from_id, prod_name, product_type, short_description, detail, price,in_stock, min_stock, shipping_policy, status, date,seo_keyword,seo_description,tags', 'required'),
			array('feature, manufacturer, popular', 'safe'),
			array('category_id, made_from_id, in_stock, min_stock, feature, status, popular', 'numerical', 'integerOnly'=>true),
			array('sku', 'length', 'max'=>100),
			array('prod_name, short_description, manufacturer, tags, option_product', 'length', 'max'=>255),
			array('price, old_price', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, sku, made_from_id, prod_name, short_description, detail, tags, price,  in_stock, min_stock, option_product, shipping_policy, feature, status, popular, date', 'safe', 'on'=>'search'),
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
			'category_id' => 'Category',
			'sku' => 'Sku',
			'made_from_id' => 'Made From',
			'prod_name' => 'Prod Name',
			'prod_type' => 'Product Type',
			'short_description' => 'Short Description',
			'manufacturer' => 'Manufacturer',
			'detail' => 'Detail',
			'tags' => 'Tags',
			'price' => 'Price',
			'old_price' => 'Old Price',
            'has_box'=>'Has Box',
			'in_stock' => 'In Stock',
			'min_stock' => 'Min Stock',
			'option_product' => 'Add On Product',
			'shipping_policy' => 'Shipping Policy',
			'feature' => 'Feature',
			'status' => 'Status',
			'popular' => 'Popular',
			'date' => 'Date',
'seo_keyword' => 'Meta Keywords',
'seo_description' => 'Meta Description',
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('sku',$this->sku,true);
		$criteria->compare('made_from_id',$this->made_from_id);
		$criteria->compare('prod_name',$this->prod_name,true);
$criteria->compare('product_type',$this->product_type);
		$criteria->compare('short_description',$this->short_description,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('old_price',$this->old_price,true);
		$criteria->compare('in_stock',$this->in_stock);
		$criteria->compare('min_stock',$this->min_stock);
		$criteria->compare('option_product',$this->option_product);
		$criteria->compare('shipping_policy',$this->shipping_policy,true);
		$criteria->compare('feature',$this->feature);
		$criteria->compare('status',$this->status);
		$criteria->compare('popular',$this->popular);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
 'pageSize' => 2,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
	    return parent::model($className);
	}
public static function getProductName($id)
	{ 
$model=Product::model()->findByPk($id);

return $model->prod_name;
	}

}
