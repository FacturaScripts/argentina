/*
 * This file is part of FacturaSctipts
 * Copyright (C) 2016  Carlos Garcia Gomez  neorazorx@gmail.com
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

var provincia_list = [
   {value: 'Buenos Aires'},
   {value: 'Catamarca'},
   {value: 'Chaco'},
   {value: 'Chubut'},
   {value: 'Córdoba'},
   {value: 'Corrientes'},
   {value: 'Entre Ríos'},
   {value: 'Formosa'},
   {value: 'JuJuy'},
   {value: 'La Pampa'},
   {value: 'La Rioja'},
   {value: 'Mendoza'},
   {value: 'Misiones'},
   {value: 'Neuquén'},
   {value: 'Río Negro'},
   {value: 'Salta'},
   {value: 'San Juan'},
   {value: 'San Luis'},
   {value: 'Santa Cruz'},
   {value: 'Santa Fe'},
   {value: 'Santiago del Estero'},
   {value: 'Tierra del Fuego'},
   {value: 'Tucumán'},
];

$(document).ready(function() {
   $("#ac_provincia, #ac_provincia2").autocomplete({
      lookup: provincia_list,
   });
});
