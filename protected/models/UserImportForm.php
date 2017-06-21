<?php 
class UserImportForm extends CFormModel
{
    public $file;
    /**
     * @return array validation rules for model attributes.
     */
         public function rules()
        {
                array('csv_file',
           'file', 'types' => 'csv',
           'maxSize'=>5242880,
           'allowEmpty' => true,
           'wrongType'=>'Only csv allowed.',
           'tooLarge'=>'File too large! 5MB is the limit'),
          }
        public function attributeLabels()
        {
            'csv_file'=>'Upload CSV File',
        }
 
    /**
     * @return array customized attribute labels (name=>label)
     */
    /*public function attributeLabels()
    {
        return array(
            'file' => 'Select file',
        );
    }*/
 
}
