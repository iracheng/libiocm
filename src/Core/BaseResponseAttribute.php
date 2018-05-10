<?php
/**
 * @link   http://www.init.lu
 * @author Cao Kang(caokang@outlook.com)
 * Date: 2018/5/7
 * Time: 下午5:07
 * Source: BaseAttribute.php
 * Project: libiocm
 */

namespace Zeevin\Libiocm\Core;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\SerializedName;

abstract class BaseResponseAttribute
{
    /**
     * 响应头信息statusCode
     * @JMS\XmlElement(cdata=false)
     * @SerializedName("statusCode")
     * @JMS\Type("integer")
     */
    protected $statusCode;
    /**
     * 响应头信息reasonPhrase
     * @JMS\XmlElement(cdata=false)
     * @SerializedName("reasonPhrase")
     * @JMS\Type("string")
     */
    protected $reasonPhrase;

    /**
     * body错误码
     * 可选
     * @JMS\XmlElement(cdata=false)
     * @SerializedName("errorCode")
     * @JMS\Type("string")
     */
    protected $errorCode;
    /**
     * body错误描述
     * 可选
     * @JMS\XmlElement(cdata=false)
     * @SerializedName("errorDesc")
     * @JMS\Type("string")
     */
    protected $errorDesc;


    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return mixed
     */
    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }

    /**
     * @param mixed $reasonPhrase
     */
    public function setReasonPhrase($reasonPhrase)
    {
        $this->reasonPhrase = $reasonPhrase;
    }

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param mixed $errorCode
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return mixed
     */
    public function getErrorDesc()
    {
        return $this->errorDesc;
    }

    /**
     * @param mixed $errorDesc
     */
    public function setErrorDesc($errorDesc)
    {
        $this->errorDesc = $errorDesc;
    }



    public function serialize($format = 'json')
    {
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        if ($format == 'form-url-encode')
        {
            $json = $serializer->serialize($this,'json');
            return http_build_query(json_decode($json,true));
        }
        else
            return $serializer->serialize($this, $format);

    }
}