<?php
namespace App\Systems;
use App\SSO\SSO;

class Base
{
   public function auth()
   {
      if (isset($_REQUEST['logout'])) {
         SSO::logout();
      }
      // SSO::logout();
      // SSO::nossl();
      // SSO::check();
      SSO::authenticate();
      
      echo "<pre>";
      print_r(SSO::getUser());
      print_r(SSO::getUser()['ldap']);

      // SSO::getUser();
      // return 
      // if( !SSO::check() ){
      // }else{
      //    return SSO::getUser();
      // }

      // echo phpCAS::getVersion();
   }

   public function get_user()
   {
      return SSO::getUser();
   }

   public function check()
   {
      return SSO::check();
   }
}