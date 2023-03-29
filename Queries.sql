-- Query to show appointment and billing details at once with food price and medication price
SELECT a.appDate, a.appTime, a.location, b.paymentType, m.price AS Medication_Price, f.price AS Food_Price
FROM Appointment a
INNER JOIN Billing b
INNER JOIN Medication m on b.medicationID = m.id
INNER JOIN Food f on b.foodID = f.id
ON a.id = b.appointmentID;

-- Query to find the total amount of pets in the vet 
SELECT COUNT(*) as Total_Pets FROM Animal;

-- Query to find the average salary of Veterinary
SELECT AVG(salary) as average_salary FROM Staff;

-- Query to find total food cost for each pet
SELECT a.id, a.animalName, SUM(f.price) AS total_food_cost
FROM Animal a
JOIN Food f ON a.animalName = f.animal
GROUP BY a.id;

-- Query to find the names and addresses of all pet owners who have more than one pet.
SELECT p.fname, p.lname, p.address
FROM PetOwner p
JOIN Animal a ON p.id = a.id
GROUP BY p.id
HAVING COUNT(*) > 1;

-- Query to find total medication cost for pet owner
SELECT p.fname, p.lname, SUM(m.price) AS total_medication_cost
FROM PetOwner p
JOIN Animal a ON p.id = a.id
JOIN Medication m ON a.id = p.id
GROUP BY p.id;