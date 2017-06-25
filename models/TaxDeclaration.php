<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tax_declaration".
 *
 * @property int $td_no
 * @property string $property_owner
 * @property string $property_index_no
 * @property string $arp_no
 * @property string $address
 * @property string $tel_no
 * @property int $survey_no
 * @property string $classification
 * @property int $area
 * @property string $market_value
 * @property string $actual_use
 * @property int $assessment_level
 * @property string $assessed_value
 * @property string $php
 * @property string $total_php
 * @property string $tot_assessed_value
 * @property int $effectivity_quarter
 * @property int $effectivity_year
 * @property string $property_kind
 * @property string $location
 * @property string $taxability
 * @property string $faas
 * @property string $cancels_arp_no
 * @property int $cancels_assessed_value
 * @property string $beneficial_user
 * @property string $user_tel_no
 * @property string $user_address
 * @property string $otc
 * @property string $oct
 * @property string $date
 * @property int $lot_no
 * @property int $blk_no
 * @property string $bound_south
 * @property string $bound_north
 * @property string $bound_east
 * @property string $bound_west
 * @property string $mun_assessor
 * @property string $prov_assessor
 * @property string $tax_dec_pdf
 * @property string $tax_dec_filename
 */
class TaxDeclaration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tax_declaration';
    }

    /**
     * @inheritdoc
     */
    public $taxdec_pdf;
    public $file;
    public $id;
    public $image;
     public $path;

    public function rules()
    {
        return [
            [['property_owner', 'property_index_no', 'arp_no', 'address', 'survey_no', 'classification', 'area', 'market_value', 'actual_use', 'assessment_level', 'assessed_value', 'php', 'total_php', 'effectivity_quarter', 'effectivity_year', 'property_kind', 'location', 'taxability','bound_south', 'bound_north', 'bound_east', 'bound_west', 'mun_assessor', 'prov_assessor'], 'required'],
            [['survey_no', 'area', 'effectivity_quarter', 'effectivity_year', 'cancels_assessed_value', 'lot_no', 'blk_no'], 'default', 'value' => null],
            [['survey_no', 'area', 'effectivity_quarter', 'effectivity_year', 'cancels_assessed_value', 'lot_no', 'blk_no'], 'integer'],
            [['market_value', 'assessed_value', 'php', 'total_php', 'assessed_value'], 'number'],
            [[ 'property_index_no', 'address', 'classification', 'actual_use', 'property_kind', 'location', 'taxability', 'faas', 'taxdec', 'cancels_arp_no', 'beneficial_user', 'user_address', 'otc', 'oct', 'bound_south', 'bound_north', 'bound_east', 'bound_west', 'mun_assessor', 'prov_assessor'], 'string', 'max' => 255],
            //[['arp_no', 'viewName'], 'string', 'max' => 128],
            [['arp_no'], 'string', 'max' => 128],
            [['tel_no', 'user_tel_no', 'date'], 'string', 'max' => 15],
            [['property_owner','tot_assessed_value'], 'string', 'max' => 255],
            [['arp_no'], 'unique'],
            [['property_index_no'], 'unique'],
            [['property_owner'], 'unique'],
            [['survey_no'], 'unique'],
            [['faas','taxdec'], 'required', 'on'=>'create'],
            // [['faas','taxdec'], 'string', 'skipOnEmpty' => true, 'on'=>'update'],
            // [['taxdec_pdf'], 'safe'],
            // [['taxdec_pdf'], 'file', 'extensions'=>'pdf'],
            
            // [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx,xls'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'td_no' => 'TD No',
            'property_owner' => 'Property Owner',
            'property_index_no' => 'Property Index No',
            'arp_no' => 'ARP No',
            'address' => 'Address',
            'tel_no' => 'Telephone No',
            'survey_no' => 'Survey No',
            'classification' => 'Classification',
            'area' => 'Area',
            'market_value' => 'Market Value',
            'actual_use' => 'Actual Use',
            'assessment_level' => 'Assessment Level (%)',
            'assessed_value' => 'Assessed Value',
            'php' => 'PHP',
            'total_php' => 'Total PHP',
            'tot_assessed_value' => 'Total Assessed Value (Amount in Words)',
            'effectivity_quarter' => 'Effectivity Quarter',
            'effectivity_year' => 'Effectivity Year',
            'property_kind' => 'Kind of Property Assessed',
            'location' => 'Location of Property (No. & Street, Brgy/District, Municipality & Province/City',
            'taxability' => 'Taxability',
            //'faas' => 'FAAS',
            //'taxdec' => 'Tax Declaration',
            // 'cancels_arp_no' => 'Cancel ARP No.',
            // 'cancels_assessed_value' => 'Cancel Assessed Value',
            'beneficial_user' => 'Administrator/Beneficial User',
            'user_tel_no' => 'Beneficial User Tel No',
            'user_address' => 'Beneficial User Address',
            'otc' => 'OTC/TCT',
            'oct' => 'OCT/CLOA No',
            'date' => 'Dated',
            'lot_no' => 'Lot No',
            'blk_no' => 'Blk No',
            'bound_south' => 'South Boundary',
            'bound_north' => 'North Boundary',
            'bound_east' => 'East Boundary',
            'bound_west' => 'West Boundary',
            'mun_assessor' => 'OIC-Municipal Assessor',
            'prov_assessor' => 'Provincial Assessor',
            // 'tax_dec_pdf' => 'Tax Dec PDF',
            // 'tax_dec_filename' => 'Tax Dec Filename',
        ];
    }

   public function upload()
    {
        if ($this->validate()) {
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            $this->faas->saveAs('faas_uploads/' . $this->faas->baseName . '.' . $this->faas->extension);
            $this->taxdec->saveAs('taxdec_uploads/' . $this->taxdec->baseName . '.' . $this->taxdec->extension);
            return true;
        } else {
            return false;
        }
    }

    public function gridFloorData($image)
        {
            $height = SystemConfig::getValue('venue_profile_height');
            $width = SystemConfig::getValue('venue_profile_width');
            $path='/upload/venue_profile/';
            $path1='/upload/venue_floor/';
            
            $image_path =  UtilityHtml::getAdminImage($image,$path1);
            
            $userfile_array = explode(".", strtolower($image_path));
            $userfile_extn = ($userfile_array[count($userfile_array) - 1] );
            
            if ($userfile_extn == 'jpg' || $userfile_extn == 'png' || $userfile_extn == 'jpeg' || $userfile_extn == 'gif' || $userfile_extn == 'bmp' || $userfile_extn == '') {
                echo $data = '<a class="fancybox1" href="'.$image_path.'"><img height='.$height.' width='.$width.' src="'.$image_path.'"></a>';
            }else{
             //if file is PDF........
                echo $data = '<a target="_blank" href="'.$image_path.'">'.$image.'</a>';
            }
        }

        public static function getAdminImage($image,$path) {

                if ($image != '' && file_exists(YiiBase::getPathOfAlias('webroot') . $path . $image)) {
                        return  Yii::app()->request->baseUrl . $path . $image;
                } else {
                        return  Yii::app()->request->baseUrl . $path.'images.jpg';
                }

        }
}
