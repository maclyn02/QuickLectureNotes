import java.awt.Color;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import javax.imageio.ImageIO;
import java.util.*;
 
public class Lseg
{ 
    private static BufferedImage original, segmented,s; 	
    public static void main(String[] args) throws IOException 
	{ 
        File original_f = new File(args[0]);
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
		original = ImageIO.read(original_f);
		segmented = segment(original);
        writeImage(out_f,segmented);  		
    } 
    private static void writeImage(String output,BufferedImage image) throws IOException 
	{
        File file = new File(".\\WordSeg_img\\"+output+".jpg");
        ImageIO.write(image, "jpg", file);
    }
 
    private static BufferedImage segment(BufferedImage original) 
	{ 
        int alpha, red, green, blue,count=0;
        int newPixel; 
		int[] hist=new int[original.getHeight()];
		int[] d1=new int[original.getHeight()/2];
		int[] d2=new int[original.getHeight()/2];
		for(int  j=0; j<original.getHeight(); j++ )
		{
			count=0;
			for(int i=0; i<original.getWidth(); i++) 
			{
				red = new Color(original.getRGB(i, j)).getRed();
				green = new Color(original.getRGB(i, j)).getGreen();
				blue = new Color(original.getRGB(i, j)).getBlue();
 
				if(red==0 && blue==0 && green==0)
				{
					count++;
				}
			}
			hist[j]=count;
		}
		int count1=0,c=0;
		d1[count1]=0;
		d2[count1++]=0;
		for(int  j=0; j<original.getHeight(); j++ )
		{
			if(hist[j]>0 && c==0)
			{
				d1[count1]=j;
				c=1;
			}
			else if(c==1)
			{
				if(hist[j]==0)
				{
					c=0;
					d2[count1++]=j-1;
				}
			}				
		}	
		d1[count1]=original.getHeight()-1;
		d2[count1++]=original.getHeight()-1;
		
        BufferedImage lum = new BufferedImage(original.getWidth(), original.getHeight(), original.getType());
		int d_size=count1;
		count1=0;
        for(int  j=0; j<original.getHeight(); j++ )
		{
			if(count1<d_size && j>=d1[count1] && j<=d2[count1])
			{
				if((d2[count1]-d1[count1])<30)
				{
					for(int k=d1[count1];k<=d2[count1];k++)
					{
						for(int i=0; i<original.getWidth(); i++)
						{					
							alpha = new Color(original.getRGB(i, k)).getAlpha();
							newPixel = colorToRGB(alpha,200,200,200);
							lum.setRGB(i, k, newPixel); 
						}		
					}
					j=d2[count1];
				}
				else
				{
					for(int k=d1[count1];k<=d2[count1];k++)
					{
						for(int i=0; i<original.getWidth(); i++)
						{					
							alpha = new Color(original.getRGB(i, k)).getAlpha();
							red = new Color(original.getRGB(i, k)).getRed();
							green = new Color(original.getRGB(i, k)).getGreen();
							blue = new Color(original.getRGB(i, k)).getBlue();
							newPixel = colorToRGB(alpha,red,green,blue);
							lum.setRGB(i, k, newPixel); 
						}
					}
					j=d2[count1];
				}
			}
			else if(count1<d_size-1 && j>d2[count1] && j<d1[count1+1])
			{
				for(int k=j;k<=d1[count1+1]-1;k++)
				{
					for(int i=0; i<original.getWidth(); i++)
					{					
						alpha = new Color(original.getRGB(i, k)).getAlpha();
						newPixel = colorToRGB(alpha,200,200,200);
						lum.setRGB(i, k, newPixel);  
					}
				}
				j=d1[count1+1]-1;		
			}
			else
			{
				count1++;
				j--;
			}
		} 
        return lum; 
    }
	private static int colorToRGB(int alpha, int red, int green, int blue) 
	{ 
        int newPixel = 0;
        newPixel += alpha;
        newPixel = newPixel << 8;
        newPixel += red; newPixel = newPixel << 8;
        newPixel += green; newPixel = newPixel << 8;
        newPixel += blue; 
        return newPixel; 
    } 
}
