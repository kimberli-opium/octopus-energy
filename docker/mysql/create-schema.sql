CREATE DATABASE IF NOT EXISTS octopus;

USE octopus;

DROP TABLE IF EXISTS file_header_type;
CREATE TABLE file_header_type (
    file_id varchar(10) not null,
    data_flow_and_version_number varchar(8) not null,
    from_market_participant_role_code char(1) not null,
    from_market_participant_id char(4) not null,
    to_market_participant_role_code char(1) not null,
    to_market_participant_id char(4) not null,
    creation_timestamp datetime not null,
    sending_application_id char(5),
    receiving_application_id char(5),
    broadcast char(1),
    test_data_flag char(4),
    PRIMARY KEY (file_id)
);

DROP TABLE IF EXISTS 026_mpan_cores;
CREATE TABLE 026_mpan_cores (
    mpan_core numeric(13) not null,
    bsc_validation_status char(1)  not null,
    file_id varchar(10) not null,
    CONSTRAINT fk_mpanCores_fileId FOREIGN KEY (file_id) REFERENCES file_header_type(file_id),
    PRIMARY KEY (mpan_core)
);

DROP TABLE IF EXISTS 028_meter_reading_types;
CREATE TABLE 028_meter_reading_types (
    serial_number varchar(10) not null,
    reading_type char(1) not null,
    file_id varchar(10) not null,
    CONSTRAINT fk_meterReadingTypes_fileId FOREIGN KEY (file_id) REFERENCES file_header_type(file_id),
    PRIMARY KEY (serial_number)
);

DROP TABLE IF EXISTS 030_register_readings;
CREATE TABLE 030_register_readings (
    meter_register_id char(2) not null,
    reading_timestamp datetime not null,
    register_reading numeric(9,1) not null,
    md_reset_timestamp datetime,
    number_of_md_resets numeric(3),
    meter_reading_flag boolean,
    reading_method char(1) not null
);

DROP TABLE IF EXISTS file_footer_type;
CREATE TABLE file_footer_type (
    file_id varchar(10) not null,
    total_group_count int(10) not null,
    checksum int(10),
    flow_count int(8),
    file_completion_timestamp datetime
);
