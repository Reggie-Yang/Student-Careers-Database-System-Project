CREATE TABLE Student( 
	studentId VARCHAR(9) NOT NULL, 
	studentEmail VARCHAR(100) NOT NULL,
	studentFname VARCHAR(50) NOT NULL, 
	studentLname VARCHAR(50) NOT NULL, 
	studentGender VARCHAR(20) NOT NULL,
	pwd VARCHAR(255) NOT NULL,
	CONSTRAINT pk_Student_studentId PRIMARY KEY (studentId)
);


CREATE TABLE Company( 
	companyId VARCHAR(5) NOT NULL,
	companyName VARCHAR(50) NOT NULL,
	CONSTRAINT pk_Company_companyId PRIMARY KEY (companyId)
);

CREATE TABLE Source( 
	sourceId VARCHAR(3) NOT NULL,	
	sourceName VARCHAR(50) NOT NULL,
	CONSTRAINT pk_Source_sourceId PRIMARY KEY (sourceId)
);


CREATE TABLE Job( 
jobId VARCHAR(5) NOT NULL,
jobTitle VARCHAR(100) NOT NULL, 
jobType VARCHAR(20) NOT NULL, 
jobDescription VARCHAR(800),
jobRequirement VARCHAR(500), 
jobLocation VARCHAR(100), 
sourceId VARCHAR(3) NOT NULL, 
companyId VARCHAR(5) NOT NULL,
CONSTRAINT pk_Job_jobId PRIMARY KEY (jobId),
CONSTRAINT fk_Job_sourceId FOREIGN KEY (sourceId)
 		REFERENCES Source (sourceId)
 		ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT fk_Job_companyId FOREIGN KEY (companyId)
 		REFERENCES Company (companyId)
 		ON DELETE CASCADE ON UPDATE CASCADE
);  






CREATE TABLE CareerEvent( 
eventId VARCHAR(5) NOT NULL, 
eventName VARCHAR(300) NOT NULL,
eventLocation VARCHAR(300) NOT NULL,	
eventDate DATE NOT NULL,
CONSTRAINT pk_CareerEvent_eventId PRIMARY KEY (eventId)
	
);


CREATE TABLE SearchJ( 
studentId VARCHAR(9) NOT NULL,	
jobId VARCHAR(5) NOT NULL,	
CONSTRAINT pk_SearchJ_studentId_jobId PRIMARY KEY (studentId, jobId),
CONSTRAINT fk_SearchJ_studentId FOREIGN KEY (studentId)
REFERENCES Student (studentId)
  		ON DELETE NO ACTION ON UPDATE CASCADE,
CONSTRAINT fk_SearchJ_jobId FOREIGN KEY (jobId)
  		REFERENCES Job (jobId)
  		ON DELETE NO ACTION ON UPDATE CASCADE
);


CREATE TABLE SearchE( 
studentId VARCHAR(9) NOT NULL,	
eventId VARCHAR(5) NOT NULL,
CONSTRAINT pk_SearchE_studentId_eventId PRIMARY KEY (studentId, eventId),
CONSTRAINT fk_SearchE_studentId FOREIGN KEY (studentId)
REFERENCES Student (studentId)
  		ON DELETE NO ACTION ON UPDATE CASCADE,
CONSTRAINT fk_SearchE_eventId FOREIGN KEY (eventId)
  		REFERENCES CareerEvent (eventId)
  		ON DELETE NO ACTION ON UPDATE CASCADE
	
);
