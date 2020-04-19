CREATE TABLE users(
    userId VARCHAR(50) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    userPassword VARCHAR(1000) NOT NULL,
    referral VARCHAR(30),
    vietFluency VARCHAR(30),
    emailSubscription VARCHAR(15),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (userID)
);
CREATE TABLE events(
    eventID INTEGER,
    eventName VARCHAR(300) NOT NULL,
    eventSponsor VARCHAR(300) NOT NULL,
    eventDate int NOT NULL,
    eventTime TIME NOT NULL,
    eventDescription VARCHAR(1000),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (eventID) 
);