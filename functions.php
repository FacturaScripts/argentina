<?php
/*
 * This file is part of colombia
 * Copyright (C) 2013-2017  Carlos Garcia Gomez  neorazorx@gmail.com
 * Editado por Camilo Medina c@next-software.co
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
if( !function_exists('fs_tipos_id_fiscal') )
{
   /**
    * Devuelve la lista de identificadores fiscales.
    * @return type
    */
   function fs_tipos_id_fiscal()
   {
      return array('DNI','CUIT','Pasaporte');
   }
}
