# librenms-plugin-tvm

A custom and purpose build LibreNMS plugin that displays if certain IT-operation tasks have been completed. TVM is an abbreviation for Task Verification Monitor.

## Desciption

This plugin works by fetching a comma-seperated file (.csv) and displaying it as a table within the LibreNMS plugin page. It scales (within reason) to many collums and rows by offering the ability to search the rows by the content in the first collumn.

When a cell contains the word 'True', 'False', or 'Unknown' it will color-code the cell green, red or yellow respectivly. This will give the user a quick overview of the tasks that have been completed.

![An example of TVM!](/assets/images/Example.PNG "TVM")

## Deployment

To add this plugin to LibreNMS you need to copy the files to the LibreNMS plugin directory. Because this uses the 'V1-way' of making a plugin the default folder is /opt/librenms/html/Plugins/. The easiest way to deploy this plugin is to clone the repository and setting the correct permissions by using the following commands.

    sudo git clone https://github.com/Walkablenormal/librenms-plugin-tvm.git /opt/librenms/html/Plugins/Tvm
    sudo chown -r librenms:librenms /opt/librenms/html/Plugins/Tvm

The plugin should appear in the Plugin Admin page of LibreNMS where it can be enabled.
