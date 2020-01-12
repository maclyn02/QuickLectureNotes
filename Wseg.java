import java.awt.Color;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import javax.imageio.ImageIO;
 
public class Wseg
{ 
    private static BufferedImage original, segmented;
	private static String out="temp",out_f="1";
	private static int m1=0;
	public static void main(String[] args) throws IOException 
	{ 
        File original_f = new File(args[0]);
		original = ImageIO.read(original_f);
		segment(original);       
    }
    private static void segment(BufferedImage original) throws IOException {
 
        int alpha, red, green, blue,count=0;
        int newPixel;
		int start[]=new int[10];
		int end[]=new int[10];
 
        BufferedImage lum = new BufferedImage(original.getWidth(), original.getHeight(), original.getType());
		int c=0;
		
		for(int i=0;i<original.getHeight();i++)
		{
			alpha = new Color(original.getRGB(2,i)).getAlpha();
			red = new Color(original.getRGB(2,i)).getRed();
			green = new Color(original.getRGB(2,i)).getGreen();
			blue = new Color(original.getRGB(2,i)).getBlue();
					
			if(red==255 && blue==255 && green==255)
			{	
				start[c]=i;
				for(int j=i;j<original.getHeight();j++)
				{
					alpha = new Color(original.getRGB(2,j)).getAlpha();
					red = new Color(original.getRGB(2,j)).getRed();
					green = new Color(original.getRGB(2,j)).getGreen();
					blue = new Color(original.getRGB(2,j)).getBlue();
					if(red==200 && blue==200 && green==200)
					{
						end[c]=j-1;
						i=j-1;
						c++;
						break;
					}
				}
			}		
			else
				for(int j=0;j<original.getWidth();j++)
				{
					alpha = new Color(original.getRGB(j,i)).getAlpha();
					red = new Color(original.getRGB(j,i)).getRed();
					green = new Color(original.getRGB(j,i)).getGreen();
					blue = new Color(original.getRGB(j,i)).getBlue();
					newPixel = colorToRGB(alpha,red,green,blue);
					lum.setRGB(j,i, newPixel); 
				}
		}				
		for(int k=0;k<c;k++)
		{
			int s[]=new int[1000];
			int e[]=new int[1000];
			int m=0;
			int flag=0,f=0;
			for(int  i=0; i<original.getWidth(); i++ )
			{
				count=0;
				for(int j=start[k]; j<=end[k]; j++) 
				{	 					
					alpha = new Color(original.getRGB(i, j)).getAlpha();
					red = new Color(original.getRGB(i, j)).getRed();
					green = new Color(original.getRGB(i, j)).getGreen();
					blue = new Color(original.getRGB(i, j)).getBlue();
	 
					if(red<=50 && blue<=50 && green<=50)
					{
						count=1;flag=1;
						break;
					}					
				}
				if(count==0 && flag==1)
				{
					int l;
					s[m]=i;
					for(l=i+1;l<original.getWidth();l++)
					{
						for(int j=start[k]; j<=end[k]; j++) 
						{	 					
							alpha = new Color(original.getRGB(l, j)).getAlpha();
							red = new Color(original.getRGB(l, j)).getRed();
							green = new Color(original.getRGB(l, j)).getGreen();
							blue = new Color(original.getRGB(l, j)).getBlue();
			 
							if(red<=50 && blue<=50 && green<=50)
							{
								count=1;flag=1;
								e[m++]=l-1;
								i=l-1;
								break;
							}								
						}
						if(count==1)
							break;
					}
					if(l==original.getWidth())
					{
						e[m++]=original.getWidth()-1;
						i=l-1;
					}
				}
			}	
			int a[]=new int[100];
			int a1=0;
			for(int t=0;t<m;t++)
			{				
				if((e[t]-s[t])>=80)
				{	
					a[a1++]=t;
				}
			}				
			segmented=original.getSubimage(0, start[k],	s[a[0]],	end[k]-start[k]);
			File file = new File(".\\segmented_images\\"+out+out_f+".jpg");
			out_f+="1";
			ImageIO.write(segmented, "jpg", file);
			for(int t=0;t<a1-1;t++)
			{				
				if((e[a[t]]-s[a[t]])>=80)
				{
					segmented=original.getSubimage(e[a[t]], start[k],	(s[a[t+1]]-e[a[t]]),	end[k]-start[k]);					
					file = new File(".\\segmented_images\\"+out+out_f+".jpg");
					out_f+="1";
					ImageIO.write(segmented, "jpg", file);
				}	
			}  			
		}   
    } 
    private static int colorToRGB(int alpha, int red, int green, int blue) { 
        int newPixel = 0;
        newPixel += alpha;
        newPixel = newPixel << 8;
        newPixel += red; newPixel = newPixel << 8;
        newPixel += green; newPixel = newPixel << 8;
        newPixel += blue; 
        return newPixel; 
    } 
}
