# Coding Challenge

## Task

Test: (PHP) Task: Build a simple Adressbook where a user can add/edit/delete addressbook entries, sort them by name, phone number, city, etc. 
Its NOT allowed to use ANY framework or other peoples code. A good frontend design is not needed. Security is a topic.

## Run

Clone this repo.

### Server
`bash bin/serve.sh`

[localhost:8000](localhost:8000)

### Tests
`bash bin/tests.sh`

## Features
- No SQL / Simple database engine based on [jsonlines](https://jsonlines.org/).
- Add new model fields in `./src/Models/Contact.php` easily. This does not conflict with existing data.
- Models could carry even more attributes for e.g. other input fields than *type="text"*.
- There is a CLI.

## Limitations
- Since there is no lock for limiting parallel access on our database file, only ONE user should use this application. `a user can [...]` :)
- Sorting and database reading is completely in memory, so our database file should not be bigger than PHP's configured process memory limit.
  - TODO: Throw AllMyFriendsDontFitInRamException :D
- Database object indices are equal to the line of file (starting at 0). Deleting an object shifts its following object's indices. It does no harm in THIS implementation.

## CLI

```shell
# show this help message
./address-book

# list all Contacts
./address-book -a index --sort-by="name" --sort-direction="desc"

# show a single Contact by ID
./address-book -a show --id=0

# store a Contact (TODO)
#./address-book -a store --name="Test" --phone="123456"

# update a Contact by ID (TODO)
#./address-book -a update --id=0 --name="Test2" --phone="654321"

# delete a Contact by ID
./address-book -a delete --id=0
```