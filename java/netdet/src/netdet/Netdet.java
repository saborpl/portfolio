/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package netdet;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.ConnectException;
import java.net.InetAddress;
import java.net.InetSocketAddress;
import java.net.Socket;
import java.net.SocketTimeoutException;
import java.net.UnknownHostException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author sabor
 */
public class Netdet {

    public static void checkHosts(String subnet) throws IOException {
        int timeout = 1000;
        for (int i = 100; i < 200; i++) {
            String host = subnet + "." + i;
            try {
                if (InetAddress.getByName(host).isReachable(timeout)) {
                    System.out.println(host + " is reachable");
                }
            } catch (UnknownHostException ex) {
                Logger.getLogger(Netdet.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }

    public static void aaa() {
        byte[] ip = {(byte) 192, (byte) 168, (byte) 115, (byte) 110};
        for (int i = 1; i < 255; i++) {
            //byte[] ip = {(byte) 192, (byte) 168, (byte) 115, (byte) i};
            ip[3] = (byte) i;
            try {
                InetAddress addr = InetAddress.getByAddress(ip);
                String s = addr.getHostName();
                System.out.println(s);
            } catch (UnknownHostException e) {
                System.out.println(e.getMessage());
            }
        }
    }

    public static void bbb() throws UnknownHostException, IOException {
        // Fetch local host
        InetAddress localhost = InetAddress.getLocalHost();

        // IPv4 usage
        byte[] ip = localhost.getAddress();

        // looping
        for (int i = 1; i <= 254; i++) {
            ip[3] = (byte) i;
            InetAddress address = InetAddress.getByAddress(ip);
            if (address.isReachable(1)) {
                System.out.println(address.getHostAddress() + " - Pinging... Pinging");
            } else if (!address.getHostAddress().equals(address.getHostName())) {
                System.out.println(address + " - DNS lookup known..");
            } //else {
                //System.out.println(address + " - the host address and the host name are same");
            //}
        }

    }
    
    public static void ccc() {
        String hostname = "Unknown";

        try
        {
            InetAddress addr;
            addr = InetAddress.getLocalHost();
            hostname = addr.getHostName();
        }
        catch (UnknownHostException ex)
        {
            System.out.println("Hostname can not be resolved");
        }        
    }
    
    public static void ddd() {
        Socket socket = new Socket();

        try {
            Process process = Runtime.getRuntime().exec("arp -i en0 -a -n");
            process.waitFor();
            BufferedReader reader = new BufferedReader(new InputStreamReader(process.getInputStream()));

            while (reader.ready()) {
                String ip = reader.readLine();
                ip = ip.substring(3, ip.indexOf(')'));

                try {
                    socket.connect(new InetSocketAddress(ip, 1234), 1000);
                    System.out.println("Found socket!");
                } catch (ConnectException | SocketTimeoutException ignored) {

                }
            }

            if (socket == null) {
                System.err.println("Could not find socket.");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }        
    }

    /**
     * @param args the command line arguments
     * @throws java.io.IOException
     */
    public static void main(String[] args) throws IOException {
        bbb();
    }

}
