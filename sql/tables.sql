CREATE TABLE Users (
    user VARCHAR(50) PRIMARY KEY,
    email VARCHAR(50) UNIQUE,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    password VARCHAR(150) NOT NULL,
    phone VARCHAR(9) NOT NULL
);

CREATE TABLE Qualifications (
    qualification VARCHAR(50) PRIMARY KEY
);

CREATE TABLE Profiles (
    user VARCHAR(50),
    type VARCHAR(50) NOT NULL,
    level VARCHAR(50) CHECK ( level in ('Beginer','Intermediate','Advanced')), 
    knowledge LONGTEXT,
    technologies LONGTEXT,
    PRIMARY KEY (user, type),
    FOREIGN KEY (type) REFERENCES Qualifications(qualification),
    FOREIGN KEY (user) REFERENCES Users(user)
);

INSERT INTO Qualifications (qualification) VALUES
('Backend Developer'),
('Frontend Developer'),
('User Experience Designer'),
('Software Architect'),
('Full Stack Developer'),
('DevOps Engineer'),
('Data Scientist'),
('Machine Learning Engineer'),
('Automation Engineer'),
('Virtual Reality Engineer'),
('Augmented Reality Developer'),
('Embedded Systems Developer'),
('IoT Engineer'),
('Embedded Software Engineer'),
('Firmware Developer'),
('Systems Engineer'),
('Web Application Developer'),
('Database Engineer'),
('Database Administrator'),
('Game Developer'),
('Network Engineer'),
('Network Security Specialist'),
('Test Automation Engineer'),
('Software Quality Analyst'),
('Mobile Application Developer'),
('Cloud Infrastructure Engineer'),
('Linux System Administrator'),
('Document Management Specialist')
;