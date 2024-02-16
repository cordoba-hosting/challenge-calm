#!/bin/bash

echo "running entrypoint script..."

echo "starting $@..."
exec "$@"
