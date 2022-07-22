# The hiking project 🥾

| Challenge Parameters | Challenge Details                                                                                                                                       |
| :------------------- | :------------------------------------------------------------------------------------------------------------------------------------------------------ |
| Repository           | `hiking-project`                                                                                                                                        |
| Challenge type       | `Learning`                                                                                                                                              |
| Duration             | `15 days`                                                                                                                                               |
| Deployment method    | `Heroku`                                                                                                                                                |
| Group composition    | [`Arthur Lefevre`](https://github.com/kingdragox99) [`Steeve Houbart`](https://github.com/st2eve) [`Olivier d'Ardenne`](https://github.com/MrOlivierdA) |

## The mission

As you may know, your coach is a fan of hiking. He asks you to develop an app able to store his favorites trails !
This website must be collaborative. It means that users can connect & add their own hikes.
Help hikers to connect each others for building a better world.

## Goals - At the end of this challenge you should have improved your:

- [ ] Project planning.
- [ ] Mock-up creation.
- [ ] _semantical_ HTML.
- [ ] Database creation.
- [ ] Creation of dynamic website.
- [ ] Secure programming (with nice errors messages).
- [ ] Use a router.
- [ ] OOP.
- [ ] MVC architecture.
- [ ] Agile methodology.

## Instructions

### PART 1: Creation of the database

To start working, it's easier to already have datas.
Create a database named `hiking` followed by a table called `hikes` and fill it with the following fields:

- **Hikes**:
  - ID (that will be assigned automatically)
  - name
  - date (of creation)
  - distance
  - duration
  - elevation_gain
  - description
  - update (if needed)

Once done, you will retrieve some data from an existing website like [visandro](https://www.visorando.be/) or [wikiloc](https://www.wikiloc.com/).
You have to collect at least 8 hikes and insert them the database. Each hike must fill in the fields.

Another tables:

- **Users**:

  - ID
  - firstname
  - lastname
  - nickname (must be unique)
  - email (must be unique)
  - password (must be hashed)

- **Tags**:
  - ID
  - name

Each hikes will have at least one tag (e.g.: Hard, Rocks, Forest, Historical...).

### PART 2: The architecture

#### MVC

The general architecture of your app must use the MVC.
It's a structure that will split your project into different files with a clear responsibility for each.
All PHP Frameworks use this structure (Symfony, Laravel, CodeIgniter, WordPress...).
By using this organisation, you will have a perfect use of OOP.

You can use this [**MVC Template**](https://github.com/NicolasJamar/php-mvc-boileplate) & adapt it.

#### Router

Instead of having ugly url like that `localhost/View/about.php`, we prefer to have fancy url like that `localhost/about`.

That's why to navigate nicely through your website, you have to implement a Router.

Routing allows you to define a URL pattern for the request handler. This request handler will correspond to a controller class and an action method.

You have already made this in the previous exercise.

### PART 3: Layouts

For this part, you are free to make your own design.

Your website should contain, the following layouts :

#### The list of hikes

It displays the hikes with all the info from the database (include the tags), except the id & the description.
Each hike must have a link to show its details.

All the visitors of the website can see this page.

> Bonus: display an image with the hike

#### A single hike

All the info from the hike.
The name of the creator & the tags should be displayed.
You should have a link to go back to the main page.

All the visitors of the website can see this page.

> Bonus: display an image with the hike

#### The list of hikes per tag

For example, if a user want to see all hikes with the tag "Mountain", he should be able to view only those.

All the visitors of the website can see this page.

#### Subscription page

If a visitor wants to create an account to be able to create hikes, he has to subscribe in a specific page or in a modal.
Send an email to the user when he completes his subscription.

#### User profile

A page to display the info of the user. Only the user can access to his own data.  
A user can edit his profile.  
If he wants to change his email, send an email for asking confirmation.

> Bonus: create a dashboard of hikes to edit your own hikes more easily.

### PART 4: Features

The website should contain all the basics interactions for making the life of users easy.

#### Add hike

Only when a user is connected, a button must appear to be able to add a new hike. This button should be highlighted.

You will create a form with the fields required,that will post the inputs to the database.

A user has to give at least 1 tag. He can create new tags if he doesn't find a suitable tag.

When you have managed to add a hike, it is good to notify it by message.  
Display the message "The hike has been added successfully!".

#### Edit a hike

Imagine that we were mistaken when returning the information of the hike, it should be able to change afterwards.

First, in the hikes page, add a link "Edit" attached to each hike owned by the user connected. This link will return to an update page.

A user can only update his own hikes.

On this page we will be able to make the modifications for the chosen hike. Create a form, the fields on this page must be pre-populated from
information of the chosen hike!

> TIPS: In order to differentiate the hikes it will be necessary to be based on the id and perhaps to see how to pass variables between web pages.
> If a user updates the trail, we should see the new date and the message `updated at ...`

#### Delete a hike

In the hikes page, add a link "Delete" attached to each hike owned by the user connected.
This button should not appear for the other users.

Clicking the button will send the _id_ of the hike to a delete page.

Before the delete, inform the user : "Do you really want to delete this hike ?"

When you have deleted it will return automatically (without the user does anything) to the main page.

> TIPS: For redirection to the main page you should probably take a look at the function [header ()](http://php.net/manual/en/function.header.php)

#### Admin account

Create an Admin account who can create, edit & delete any hike & can delete any user or tag.

## Bonus

### Design

You would like that a maximum of person visit your website, aren't you? So, try to make your website attractive.

### Title & Motto

You don't necessary have to call your website "The Hiking project", feel free to choose a nice title & a punchy motto to lure hikers on your website.

### Deployement

Deploy your app.  
For a free hosting, you can use the platform [Heroku](https://www.heroku.com/).  
We advise you to experiment at the beginning of your project with a simple structure to see how it works.

## Advices

- Study all the project aspects, from frontend to backend, then make a mock-up (mobile first but the other views as well), some components can be reused later, do things seriously, it will save you a lot of time.
- For the design, you can use a Bootstrap template for example.
- Take time to think about your MVC architecture.
- Use a Trello or a Github project to divide tasks.
- Have SCRUM meetings regularly (What have you done, Have you difficulties, what will you do ?).
- Divide your work in little challenges to achieve.

## Remember...

The only way to success is daring to...

![hiking and falling](https://media.giphy.com/media/3oxRmGNqKwCzJ0AwPC/giphy.gif)

# FALL!

## Good luck!
