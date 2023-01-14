# librenms-plugin-tvm
A custom and purpose build LibreNMS plugin that displays if certain IT-operation tasks have been completed. TVM is an abbreviation for Task Verification Monitor.

## Deployment

To add this plugin to LibreNMS you need to copy the files to the LibreNMS plugin directory. By default this is '/opt/librenms/app/Plugins/'. The easiest way is to clone the repository by using the following command.

  sudo -u librenms git clone https://github.com/Walkablenormal/librenms-plugin-tvm.git /opt/librenms/html/Plugins/TVM

The plugin should appear in the Plugin Admin page of LibreNMS where it can be enabled.