DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'seller'
);

INSERT INTO users (username, email, password, role) VALUES
('maze',    'maze@gmail.com',    '$2y$10$9bGyTuXL3z6Y1/HOCgMNS.63Ock9L3wZVRYwBGc1IDT88gBQ/sNHu', 'seller'), -- Maze@123
('lesego',  'lesego@gmail.com',  '$2y$10$tkfh/d9E/5MBKaaKNkFhZuqVgRzR9zZx2ffkYyUnqzJtd2EQ9UQFi', 'seller'), -- Lesego2025
('Cleo',    'cleo@gmail.com',    '$2y$10$LSUGRAG7qI1czDPQmjE47OB2/79K45ZdKAVaRJVhKAjBDOgiPGhQO', 'seller'), -- Cleo!pass
('Siya',    'siya@gmail.com',    '$2y$10$kTArKdaH5b6r9MNK4s5CNOqt4ZG5x4vURv81V0n/U0SLEHZ1.CPVu', 'seller'), -- Siya#456
('Thandi',  'thandi@gmail.com',  '$2y$10$1gfZyJGKFQ9nKYsvXVRmROx4FQk6Q7RmJ15MjEyh2jE4ijvoGfZaC', 'seller'), -- Thandi789!
('Nomsa',   'nomsa@gmail.com',   '$2y$10$XOm7XHdW4zkbhzO9Sl2Ev.R7lx5.y0mE66ndOlKLE3GHJPyDyc2DC', 'seller'), -- Nomsa@2025
('Sipho',   'sipho@gmail.com',   '$2y$10$9xvKfM2YjZu6sK4dwKreOeQkS8Zq2OcEVTDP0vbbLnxRtL45H36ii', 'seller'); -- SiphoLove1
