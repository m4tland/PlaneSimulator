PlaneSimulator
==============

### Preparation
Clone this project using git:

`
git clone https://github.com/Swapcard/PlaneSimulator PlaneSimulator && cd PlaneSimulator
`

Then you have to install phpunit to run the tests (https://phpunit.de/getting-started.html):

`wget https://phar.phpunit.de/phpunit.phar`

### Some information before starting...
- All requests must return a JSON response (see Content-Type header)
- All requests must return the correct HTTP status code
- To run the code of an exercise and see if you succeed:

    `php phpunit.phar -c app\phpunit.dist.xml src\PS\PlaneBundle\Tests\ExerciseXTest`

    with X the number of the exercise. If the test succeed congratulations you can go to the next exercise!
- You can find the output of the requests in the `output/` folder for debugging
- Use the `submit()` method on forms to submit the parameters of the request: http://api.symfony.com/2.6/Symfony/Component/Form/FormInterface.html#method_submit
- In controllers, use `getFormErrorMessage($form)` to get the errors of a form as a JSON object
- Use the method `toArray()` on `PS\PlaneBundle\Entity\Plane` and `PS\PlaneBundle\Entity\Airport` to get the array representation of the entity
- You don't need to write all getters and setters of the entities: they are already written in the parent class.
- Set all fields (excepted the id) of the entities as nullable so you don't get errors when updating the schema

### Exercise 1

You have to fill a few classes:

- Complete the mapping of the entity `PS\PlaneBundle\Entity\Plane`:
    * `id` (integer)
    * `name` (string)
    * `currentLocationX` (integer)
    * `currentLocationY` (integer)
    * `remainingFuel` (integer)
    * `passengerCount` (integer)

    You can add validation rules on the entity by using the `@Assert` annotation

- Complete the form `PS\PlaneBundle\Form\PlaneType` by adding the correct fields to the builder.

- Update the controller `PS\PlaneBundle\Controller\PlaneController` by filling the method `createAction()` that must create a plane with parameters sent in the request. Don't forget to use the form you created previously and return a 201 response containing the created plane in JSON if everything went well.

### Exercise 2

In this exercise, you will make a service to move a plane to another location.

- Write the service `PS\PlaneBundle\Services\PlaneTravelService` according to the interface `PS\PlaneBundle\Services\PlaneTravelServiceInterface` (read the comments)
- Fill the method `travelAction()` in the controller `PS\PlaneBundle\Controller\PlaneController`. The controller must return a 200 response containing the plane in JSON if everything went well. The plane must have enough fuel to travel, if not a 400 response must be returned with an explicit message.
    * You need to get the target location from the request (use the form)
    * One unit of fuel allows the plane to travel 1 km
    * You have to compute the distance between 2 points (Google is your friend!)
    * The distance between 2 locations must be an integer (round it) and it's in km.

### Exercise 3

Introducing... airports! Use events to board passengers when the plane go to an airport.

- Fill the mapping of the entity `PS\PlaneBundle\Entity\Airport` (no need to create setters and getters):
    * `locationX` (integer)
    * `locationY` (integer)
    * `readyToBoardPassengers` - The number of passengers ready to board in a plane (integer)
    * `outPassengers` - The number of passengers going out of a plane (integer)
    * `planes` - The list of planes allowed to land on this airport (0 or many)
    * Think to update the mapping of the plane entity (`airport` field)
- Fill the method `createAction()` in the controller `PS\PlaneBundle\Controller\AirportController`. The method must create an airport with parameters sent in the request. You must complete `PS\PlaneBundle\Form\AirportType` and use it in the controller. It should return a 201 response if everything went well (re-use what you did with the plane). The planes must be sent trough their ids.
- Update the method `travel()` in the service `PS\PlaneBundle\Services\PlaneTravelService`:
    * Dispatch an event only if the target location matches an airport where the plane is authorized to land.
    * Use the `PS\PlaneBundle\Event\LandingEvent`
- Complete the listener `PS\PlaneBundle\EventListener\AirportLandingSubscriber`
    * To help you, there is a method called `findOneByLocation(Location $location)` in the Airport Repository.
    * You'll probably need the following services: `@doctrine.orm.entity_manager`, `@event_dispatcher`
    * When a plane lands on an airport, all its passengers must go in the airport, and all passengers of the airport that are ready to board must board the plane. Finally, after this process the passengers that are ready to board is reset (using the `reset()` method of the Airport). For example:

 >   "A" is a plane with 200 passengers and landing on the Airport "B" where 171 persons are ready to board. When "A" lands on "B", then "A" has 171 passengers, "B" has a random number of persons ready to board and 200 persons going out.
