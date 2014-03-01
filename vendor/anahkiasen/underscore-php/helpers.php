<?php

/**
 * Shortcut alias to creating an Underscore object
 *
 * @param mixed $type A scalar type to wrap
 *
 * @return \Underscore\Underscore
 */
function underscore($type) {
  return new Underscore\Underscore($type);
}

/**
 * Shortcut alias for underscore()
 *
 * @param mixed $type
 *
 * @return \Underscore\Underscore
 */
function __($type) {
	return underscore($type);
}