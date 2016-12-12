<?php

namespace Josh\Faker;

class Generator {

    /**
     * Getter of gender type
     *
     * @var string | null
     */
    protected $gender = null;

    /**
     * List of first names
     *
     * @var array
     */
    protected $names = [
        'male' => [
            'عباس', 'وحید', 'علی', 'علیرضا', 'شاهرخ', 'سجاد', 'شایان' , 'حسام' , 'مهدی' ,
            'حسن' , 'حمید'
        ],
        'female' => [
            'شقایق', 'المیرا', 'شیما', 'مرجان', 'پرستو', 'نگار' , 'ترانه' , 'لیلا' , 'مریم' ,
            'سحر' , 'زهرا'
        ]
    ];

    /**
     * List of last names
     *
     * @var array
     */
    protected $families = [
        'الماسی', 'جوشقانی', 'جمالیان', 'جعفری', 'فیض', 'نیاکان', 'بیات',
        'پیرو' , 'حیدری' , 'نجاران' , 'اسد نژاد' , 'صمدی' , 'اسدی' , 'کریمی' ,
        'حسینی' , 'الماسی' , 'صدیقی' , 'مسقطی' , 'علی دوستی' , 'کریمزاده' , 'کوت آبادی'
    ];

    /**
     * List of mail services
     *
     * @var array
     */
    protected $mailServices = [
        'gmail.com' , 'mail.com' , 'yahoo.com' , 'outlook.com'
    ];

    /**
     * List of telephone services
     *
     * @var array
     */
    protected $prefixTelePhones = [
        912 , 931 , 932 , 933 , 901 , 921 , 919 , 912 , 913 , 917 ,
        915 , 916 , 910 , 939 , 938 , 937 , 918 , 914 , 911 , 934
    ];

    /**
     * List of phone services
     *
     * @var array
     */
    protected $prefixPhones = [
        21 , 25 , 253 , 32 , 45 , 67 , 11 , 12 , 93 , 65 , 34 , 67
    ];

    /**
     * List of protocols
     *
     * @var array
     */
    protected $protocols = [ 'http' , 'https' ];

    /**
     * List of domains
     *
     * @var array
     */
    protected $domains = [
        '.com' , '.org' , '.ir' , '.net' , '.me' , '.info' , '.co'
    ];

    /**
     * Generator constructor.
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @param $gender
     */
    public function __construct($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Get firtname
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return mixed
     */
    public function firstname()
    {
        $gender = $this->gender;

        if(! is_null($gender)){

            $names = $this->names[$gender];

            $name = array_rand($names);

            return $names[$name];

        }

        $names = array_merge($this->names['male'],$this->names['female']);

        $name = array_rand($names);

        return $names[$name];
    }

    /**
     * Get last name
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return mixed
     */
    public function lastname()
    {
        $name = array_rand($this->families);

        return $this->families[$name];
    }

    /**
     * Get random firstname and lastname
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function fullname()
    {
        return $this->firstname() . ' ' . $this->lastname();
    }

    /**
     * Get telephone
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function telephone()
    {
        $prefix = array_rand($this->prefixTelePhones);

        $prefix = $this->prefixTelePhones[$prefix];

        return (string) '0' . $prefix . rand(1111111,9999999);
    }

    /**
     * Get random phone
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function phone()
    {
        $prefix = array_rand($this->prefixPhones);

        $prefix = $this->prefixPhones[$prefix];

        return (string) '0' . $prefix . rand(1111111,9999999);
    }

    /**
     * Get random email
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function email()
    {
        $service = array_rand($this->mailServices);

        $service = $this->mailServices[$service];

        return (string) randomString(30,'lowercase') . '@' . $service;
    }

    /**
     * Get random domain
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function domain()
    {
        $domain = array_rand($this->domains);

        $domain = $this->domains[$domain];

        return (string) randomString(20,'lowercase') . $domain;
    }

    /**
     * Get random website
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function website()
    {
        $protocol = array_rand($this->protocols);

        $protocol = $this->protocols[$protocol];
        
        return $protocol . '://www' . $this->domain();
    }

    /**
     * Get random page url
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function pageUrl()
    {
        $rand = rand(3,7);

        $string = '';

        $count = rand(2,8);

        for($i=0;$i < $rand;$i++){
            $string .= randomString($count,'lowercase') . '/';
        }

        return rtrim($string,'/');
    }

    /**
     * Get random age
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @param int $min
     * @param int $max
     * @return int
     */
    public function age($min = 16, $max = 70)
    {
        return rand($min,$max);
    }

}