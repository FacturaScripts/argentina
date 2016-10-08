<?php

/*
 * This file is part of FacturaSctipts
 * Copyright (C) 2015-2016  Carlos Garcia Gomez  neorazorx@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_model('impuesto.php');

/**
 * Description of admin_argentina
 *
 * @author carlos
 */
class admin_argentina extends fs_controller
{
   public $impuestos_ok;
   
   public function __construct()
   {
      parent::__construct(__CLASS__, 'Argentina', 'admin');
   }
   
   protected function private_core()
   {
      $this->check_impuestos();
      
      if( isset($_GET['opcion']) )
      {
         if($_GET['opcion'] == 'moneda')
         {
            $this->empresa->coddivisa = 'ARS';
            if( $this->empresa->save() )
            {
               $this->new_message('Datos guardados correctamente.');
            }
         }
         else if($_GET['opcion'] == 'pais')
         {
            $this->empresa->codpais = 'ARG';
            if( $this->empresa->save() )
            {
               $this->new_message('Datos guardados correctamente.');
            }
         }
         else if($_GET['opcion'] == 'iva')
         {
            $this->set_impuestos();
         }
      }
      else
      {
         $this->share_extensions();
      }
   }
   
   private function check_impuestos()
   {
      $this->impuestos_ok = FALSE;
      
      $imp0 = new impuesto();
      foreach($imp0->all() as $i)
      {
         if($i->codimpuesto == 'AR27')
         {
            $this->impuestos_ok = TRUE;
            break;
         }
      }
   }
   
   private function set_impuestos()
   {
      /// eliminamos los impuestos que ya existen (los de España)
      $imp0 = new impuesto();
      foreach($imp0->all() as $impuesto)
      {
         $this->desvincular_articulos($impuesto->codimpuesto);
         $impuesto->delete();
      }
      
      /// añadimos los de Argentina
      $codimp = array("AR0","AR21","AR105","AR5","AR27");
      $desc = array("AR 0%","AR 21%","AR 10,5%","AR 5%","AR 27%");
      $recargo = 0;
      $iva = array(0, 21, 10.5, 5, 27);
      $cant = count($codimp);
      for($i=0; $i<$cant; $i++)
      {
         $impuesto = new impuesto();
         $impuesto->codimpuesto = $codimp[$i];
         $impuesto->descripcion = $desc[$i];
         $impuesto->recargo = $recargo;
         $impuesto->iva = $iva[$i];
         $impuesto->save();
      }
      
      $this->impuestos_ok = TRUE;
      $this->new_message('Impuestos de Argentina añadidos.');
   }
   
   private function desvincular_articulos($codimpuesto)
   {
      $sql = "UPDATE articulos SET codimpuesto = null WHERE codimpuesto = "
              .$this->empresa->var2str($codimpuesto).';';
      
      if( $this->db->table_exists('articulos') )
      {
         $this->db->exec($sql);
      }
   }
   
   private function share_extensions()
   {
      
   }
}
