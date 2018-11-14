## License
This software is licensed under the GNU Lesser General Public License v3.0.

## Purpose
Intended to make cheap H.264 and MJPEG cameras more useful, this program is designed to take FTP uploaded recordings, index them in a MySQL database, and allow one to browse them via a web interface.

It does no special recording or modifying of the camera parameters, and simply reads and displays data given to it. It can provide a live view from the cameras if they are accessible from the web server running the software, but this is not required.

Being so lightweight, one could deploy it on simple hardware (ie, a reaspberry pi) or a cheap VM if the storage space is available.

Most of the code outputs JSON formatted data or direct streams/snapshots, making it easy to use as a middle-man for other solutions.