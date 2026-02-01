

## About the project

This is an assignment for Envolutions. After review this will be deleted

## Installation

i developed it in docker
for non-linux users, you need docker desktop
for non-mac users, possibly there could be an error in de dockerfile, because of architectual issue.
i tried to keep the dockerfile as simple as possible.

When pulled, normally it would be as simple as:
- go to the directory in which the app is installed
- copy .env.example to .env
- change the DB settings to your mysql instance( or the docker instance)
   if using the docker instance, maybe change them in docker-compose.yml and use these in your environment
- then use the following:
```

docker compose exec app /bin/bash
composer install
php artisan migrate
php artisan db:seed
```
- next you can goto localhost in you webbrowser and you will enter a login screen.

login credentials are found in the userSeeder

## considerations

- i could have used  livewire, vue or react. Although i know this i mainly use pure lavarel with blade.
- i thought about laravel breeze. I tried it, but i completely broke my css rendering. It would have taken sometime to fix that,
while a simple own authentication works as well. Breeze would have got more functionality than requested.
- About the replies, i was thinking about a parent child relation between replies. That would have created a bit more complexity
- I strongly believe in SOLID. That's why i don't like business logic in controllers, but also don't really like saving, fetching and creating models everywhere in the code.
  That's why i created the DTO's and repositories. I think it also reflects in my views.
- For the roles and permissions i tried to show what you can do with it. That's why i used spatie in combination of Policies.
- You can completely fine grain the permissions of a user. And using scopes made sure i didn't have to check if a user would be allowed to see some tickets, that's handle with the scope (through the database)
- The SLA is decided through the priority. Right now, it is defined with hours that is set on the creation_date
- instead of using a controller and an admin controller, i wanted to do everything in one controller/ setup
- the use of Enums. Those could have been database tables. But then you need some gui management. There was nothing mentioning that.
  This works fast and is easily extendable.

## amount of work
I think i spend about 8:30 hours on the project. My development time was a bit scattered last week. Sometimes did 10 minutes,
then half and hour. Because the busy schedule , i didn't log the hours completely, but is definitely not more than 9 hours.
Because of this, sometimes i had to backtrack some code. That's why it took a bit longer than planned.
Luckily i had planned about i would do in order.
What i did was:
- authentication
- roles
- crude views setup
- fine grain roles and permissions for the views
- add the sla
- update the sla
- testing
- 

because of the way i used the roles and permissions, there is one view.
i just needed to test if the user had the right permission to view or edit everything


## Next steps
- i know some views are not clean enough.
- the DTO's. I think there could be a better implementation. Right now ith works, and it is clean, but it feels a bit 'not development friendly enough'
- the SLA. I think it is weird that when i change a ticket with a high priority to low, the sla will be extended.
  something to discuss.
- Have a better overview when a sla is overdue.
- some views are missing some parts, like a reply overview missing a user and datetime from the reply
- using a different field for the creation_date of a ticket, instead of the created_at.
  Because the created_at is created by laravel, and done in the save method, i had no direct way to get that date.
  I could extend or overwrite the timestamp method of eloquent, but that would also be out of scope.
- use laravel pint !
- create some user management
- add some filters for overviews
- maybe send mail when a ticket is created. Use a mailjob/queue for that
- maybe more management for the priority/ status and sla.
- add a cron or a task-scheduling for overdue tickets


