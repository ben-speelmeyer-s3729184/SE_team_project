CREATE database sepm;

CREATE TABLE users (
    userId int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    role varchar(10) NOT NULL,
    username varchar(50) NOT NULL UNIQUE,
    password varchar(255) NOT NULL,
    permTour int(1) NOT NULL,
    permLocation int(1) NOT NULL,
    permUser int(1) NOT NULL,
    created_at datatime CURRENT_TIMESTAMP
    );

CREATE TABLE locations (
    locationId int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    locationName varchar(60) NOT NULL,
    locationX varchar(1) NOT NULL,
    locationY int(2) NOT NULL,
    locationDescription varchar(200),
    locationMinTime varchar(60) NOT NULL
);

CREATE TABLE tours (
    tourId int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    tourName varchar(20) NOT NULL,
    tourType varchar(10),
    tourDuration int(11) NOT NULL,
    tourStatus carchar(15) NOT NULL
);

CREATE TABLE tourLocations (
    tourId int(11) NOT NULL PRIMARY KEY,
    locationId int(11) NOT NULL,
    minTime int(11) NOT NULL,
    FOREIGN KEY (tourId) REFERENCES tours(tourId),
    FOREIGN KEY (locationId) REFERENCES locations(locationId)
);