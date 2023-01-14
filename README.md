# librenms-plugin-tvm

A custom and purpose build LibreNMS plugin that displays if certain IT-operation tasks have been completed. TVM is an abbreviation for Task Verification Monitor.

## Desciption

This plugin works by fetching a comma-seperated file (.csv) and displaying it as a table within the LibreNMS plugin page. It scales (within reason) to many collums and rows by offering the ability to search the rows by the content in the first collumn.

When a cell contains the word 'True', 'False', or 'Unknown' it will color-code the cell green, red or yellow respectivly. This will give the user a quick overview of the tasks that have been completed.

![An example of TVM!](/assets/images/Example.PNG "TVM")

## Deployment

To add this plugin to LibreNMS you need to copy the files to the LibreNMS plugin directory. By default this is '/opt/librenms/app/Plugins/'. The easiest way is to clone the repository by using the following command.

    sudo -u librenms git clone https://github.com/Walkablenormal/librenms-plugin-tvm.git /opt/librenms/html/Plugins/TVM

The plugin should appear in the Plugin Admin page of LibreNMS where it can be enabled.
