<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    //nazov tabulky
    protected $table = 'administrators';
    //nazov primarneho kluca
    protected $primaryKey = 'id';

  /**
  *   fcia na kontrolu spravnosti hesla
  */
  public function kontrola_hesla($heslo) {

    if ( $this->tep_validate_password($heslo, $this->customers_password) ){
      //dd('true');
      return true;
    } else {
      //dd($heslo.'<br>'.$this->customers_password);
      return false;
    }
  }



/**
 *        POMOCNE FCIE Z OSCOMMERCE na pripojenie k jej DB
 */
    //z oscommerce vybrane funckie kvoli heslam
    public static function tep_rand($min = null, $max = null) {
        static $seeded;

        if (!isset($seeded)) {
          mt_srand((double)microtime()*1000000);
          $seeded = true;
        }

        if (isset($min) && isset($max)) {
          if ($min >= $max) {
            return $min;
          } else {
            return mt_rand($min, $max);
          }
        } else {
          return mt_rand();
        }
    }
    // This function makes a new password from a plaintext password.
    public static function tep_encrypt_password($plain) {
        $password = '';

        for ($i=0; $i<10; $i++) {
            $password .= self::tep_rand();
        }

        $salt = substr(md5($password), 0, 2);

        $password = md5($salt . $plain) . ':' . $salt;

        return $password;
    }

    public static function tep_validate_password($plain, $encrypted) {

        if ( !is_null($plain) && !is_null($encrypted)) {
    // split apart the hash / salt
          $stack = explode(':', $encrypted);

          if (sizeof($stack) != 2) return false;
          $temp = md5($stack[1] . $plain);
          //dd($temp);
          if (md5($stack[1] . $plain) == $stack[0]) {
            return true;
          }
        }
        return false;
    }



}
