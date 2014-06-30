# Spyglass: Let's take a look.

## Description

Spyglass is a simple library which provides a mechanism by which you can display information in a dock on your web pages.

## Installation

- Download Spyglass library
- Add Spyglass to your Autoloader

## Usage

$spyglass = new \Converge\Spyglass\Spyglass;
$spyglass->addLense(new \namespace\for\my\lense);
echo $spyglass->render();

### Using a custom template

A custom template will provide a custom wrapper around the lenses for viewing.

Pass the fully qualified path to a PHP or PHTML file to \Converge\Spyglass\Spyglass::render()

_Note_: Render passes an array ```$lenses``` to the template.

## Extending

Create a lense extending \Converge\Spyglass\Lense

## To-Do

- [ ] Allow passing templates to Spyglass::render()