-- ----------------------------------------------------------
-- MDB Tools - A library for reading MS Access database files
-- Copyright (C) 2000-2011 Brian Bruns and others.
-- Files in libmdb are licensed under LGPL and the utilities under
-- the GPL, see COPYING.LIB and COPYING files respectively.
-- Check out http://mdbtools.sourceforge.net
-- ----------------------------------------------------------

-- That file uses encoding UTF-8

DROP TABLE IF EXISTS `T_Art17_Investments`;
CREATE TABLE `T_Art17_Investments`
 (
	`Art17_InvestmentJobsID`			INTEGER, 
	`flarepCode`			varchar, 
	`soecCapacity`			INTEGER, 
	`soecCode`			varchar, 
	`soecEndYear`			DateTime, 
	`soecEUFunds`			INTEGER, 
	`soecInvCol`			INTEGER, 
	`soecInvComments`			TEXT, 
	`soecInvIAS`			INTEGER, 
	`soecInvTp`			INTEGER, 
	`soecJobs`			INTEGER, 
	`soecLenghtCoCs`			INTEGER, 
	`soecLenghtSaCs`			INTEGER, 
	`soecLenghtStCs`			INTEGER, 
	`soecNumbIAS`			INTEGER, 
	`soecOpCosts`			INTEGER, 
	`soecPeriod`			varchar, 
	`soecPop`			INTEGER, 
	`soecStartYear`			DateTime
);


-- CREATE Relationships ...
