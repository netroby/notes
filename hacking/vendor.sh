#!/bin/sh
case "$1" in
    'self-update') php composer.phar self-update
        ;;

    'cleanvendor') rm -rf vendor/*
        ;;

    'clearcache') php composer.phar clearcache
        ;;
    'update') php composer.phar update --prefer-dist
        ;;

    'optimize') php composer.phar dump-autoload -o
        ;;

    *) echo "$0 (self-update|cleanvendor|clearcache|update|optimize)"
        ;;
esac
