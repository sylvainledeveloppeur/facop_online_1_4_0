<?php

/*
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License or any later version.
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// Exit if accessed directly
if (!defined('__MONETBIL__')) {
    exit;
}

// To get your service key and secret, go to -> https://www.monetbil.com/services
Monetbil::setServiceKey('htf5V4y5Sl5uNurK6BdgKVd2hIfy38Le');
Monetbil::setServiceSecret('2IDNl3gndycUT7qdiHgFC6PpbdIsDJcR0wMJq0ZUKKLYHC1SkbkSuoFDozCv6p4o');

// To use responsive widget, set version to 'v2.1'
Monetbil::setWidgetVersion('v2.1');
