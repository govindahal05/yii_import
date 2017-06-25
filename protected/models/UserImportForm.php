<?php 
class UserImportForm extends CFormModel
{
    public $file;
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(  
            array('file', 'file', 
                                            'types'=>'csv',
                                            'maxSize'=>1024 * 1024 * 10, // 10MB
                                            'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',
                                            'allowEmpty' => false
            ),
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
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id', 'category_id','sku', 'made_from_id',   'prod_name',  'product_type',   'url_title',  'short_description',  'manufacturer',   'detail', 'tags',   'seo_keyword','seo_description','price',  'old_price',  'in_stock',   'min_stock',  'option_product', 'shipping_policy','feature','status', 'popular','date',   'has_box'
            );
    } 
}
