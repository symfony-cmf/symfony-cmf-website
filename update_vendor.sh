#!/bin/sh

# First level submodules
git submodule init
git submodule update

# Zend submodules
cd src/vendor/zend
git submodule init
git submodule update

echo "The vendors are up to date."
