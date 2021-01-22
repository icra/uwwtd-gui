-- ----------------------------------------------------------
-- MDB Tools - A library for reading MS Access database files
-- Copyright (C) 2000-2011 Brian Bruns and others.
-- Files in libmdb are licensed under LGPL and the utilities under
-- the GPL, see COPYING.LIB and COPYING files respectively.
-- Check out http://mdbtools.sourceforge.net
-- ----------------------------------------------------------

-- That file uses encoding UTF-8

DROP TABLE IF EXISTS `T_ReceivingAreas_SA54`;
CREATE TABLE `T_ReceivingAreas_SA54`
 (
	`ReceivingAreas_SA54Id`			INTEGER, 
	`rcaCode`			varchar, 
	`rcaMethod54`			varchar, 
	`rcaPlants54`			INTEGER, 
	`rcaPlantsCapacity54`			INTEGER, 
	`rcaNIncoming54`			INTEGER, 
	`rcaNDischarged54`			INTEGER, 
	`rcaPIncoming54`			INTEGER, 
	`rcaPDischarged54`			INTEGER, 
	`repCode`			varchar
);


-- CREATE Relationships ...
