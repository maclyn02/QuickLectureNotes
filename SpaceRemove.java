import java.io.*;
public class SpaceRemove 
{
    public static void main(String args[])
	{
		try
		{
			char[] c=args[0].toCharArray();
			String in="";
			
			for(int i=args[0].length()-1;i>=0;i--)
				in=in+""+c[i];
			in=in.substring(in.indexOf('.')+1,in.indexOf('\\'));
			char[] c1=in.toCharArray();
			
			String in1="";
			
			for(int i=in.length()-1;i>=0;i--)
				in1=in1+""+c1[i];
			String out_f = in1;
			BufferedReader br=new  BufferedReader(new FileReader(args[0]));
			BufferedWriter bw = new BufferedWriter(new FileWriter(out_f+"_t.txt",true));
			String data=br.readLine();
			char[] d=data.toCharArray();
			int l=data.length();
		    String newLine = "";
			for (int i = 0; i < l-1; i++)
			{
				if (d[i]==' ' && d[i+1]!=' ') 
				{  
					newLine += "";
				}
				else
				{
					newLine += d[i];
				}
			}
			bw.write(newLine);
			
			bw.close(); 
			br.close();
        }
	    catch(Exception e)
	    {
			System.out.println(e);
	    }
	} 
}
