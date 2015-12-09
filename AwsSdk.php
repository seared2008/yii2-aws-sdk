<?php
/**
 * @copyright Federico Nicolás Motta
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php The MIT License (MIT)
 * @package yii2-aws-sdk
 */
namespace fedemotta\awssdk;
use yii\base\Component;
use Aws\Common\Aws;

/**
 * Yii2 component wrapping of the AWS SDK for easy configuration
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 */
class AwsSdk extends Component
{
    /*
     * @var string specifies the AWS key
     */
    public $key = null;
    
    /*
     * @var string specifies the AWS secret
     */
    public $secret = null;
    
    /*
     * @var string specifies the AWS region
     */
    public $region = null;
    
    /*
     * @var string specifies the AWS version
     */
    public $version = null;
    
    /*
     * @var array specifies extra params
     */
    public $extra = [];
    
    /**
     * @var AWS SDK instance
     */
    protected $_awssdk;
    
    /**
     * Initializes (if needed) and fetches the AWS SDK instance
     * @return Aws instance
     */
    public function getAwsSdk()
    {
        if (empty($this->_awssdk) || !$this->_awssdk instanceof Aws\Aws) {
            $this->setAwsSdk();
        }
        return $this->_awssdk;
    }
    /**
     * Sets the AWS SDK instance
     */
    public function setAwsSdk()
    {
        $this->_awssdk = Aws::factory(array_merge([ 'key'=>$this->key,
                                        'secret'=>$this->secret,
                                        'region'=>$this->region,
                                        'version'=>$this->version],$this->extra));
    }
}
